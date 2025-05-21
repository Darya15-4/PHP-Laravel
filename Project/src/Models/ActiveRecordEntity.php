<?php

namespace src\Models;

use src\Services\Db;

abstract class ActiveRecordEntity
{
    protected $id;

    public function getId()
    {
        return $this->id;
    }

    public function __set($column, $value)
    {
        $property = $this->upperToCamelCase($column);
        $this->$property = $value;
    }

    private function upperToCamelCase(string $column): string
    {
        return lcfirst(str_replace('_', '', ucwords($column, '_')));
    }

    private function camelcaseToUpper(string $property): string
    {
        return strtolower(preg_replace('/([A-Z])/', '_$1', $property));
    }

    protected function mapPropertiesToDbColumns(): array
    {
        $reflector = new \ReflectionObject($this);
        $properties = [];

        foreach ($reflector->getProperties() as $property) {
            $propertyName = $property->getName();
            $propertyNameDb = $this->camelcaseToUpper($propertyName);
            $properties[$propertyNameDb] = $this->$propertyName;
        }

        return $properties;
    }

    public static function findAll(): array
    {
        $db = Db::getInstance();
        $sql = 'SELECT * FROM "' . static::getTableName() . '"';
        return $db->query($sql, [], static::class) ?: [];
    }

    public static function getById(int $id)
    {
        $db = Db::getInstance();
        $sql = 'SELECT * FROM "' . static::getTableName() . '" WHERE "id" = :id';
        $entities = $db->query($sql, [':id' => $id], static::class);
        return $entities ? $entities[0] : null;
    }

    public function save()
    {
        $propertiesDB = $this->mapPropertiesToDbColumns();

        if ($this->id) {
            $this->update($propertiesDB);
        } else {
            $this->insert($propertiesDB);
        }
    }

    protected function update(array $propertiesDB): void
    {
        $db = Db::getInstance();
        $columns2Params = [];
        $params2Values = [];

        foreach ($propertiesDB as $key => $value) {
            $param = ':' . $key;
            $column = '"' . $key . '"';
            $columns2Params[] = $column . ' = ' . $param;
            $params2Values[$param] = $value;
        }

        $params2Values[':id'] = $this->id;

        $sql = 'UPDATE "' . static::getTableName() . '" SET ' . implode(', ', $columns2Params) . ' WHERE "id" = :id';
        $db->query($sql, $params2Values, static::class);
    }

    protected function insert(array $propertiesDB): void
    {
        $propertiesDB = array_filter($propertiesDB, function ($value) {
            return $value !== null;
        });

        $db = Db::getInstance();
        $columns = [];
        $params = [];
        $params2Values = [];

        foreach ($propertiesDB as $key => $value) {
            $columns[] = '"' . $key . '"';
            $param = ':' . $key;
            $params[] = $param;
            $params2Values[$param] = $value;
        }

        $sql = 'INSERT INTO "' . static::getTableName() . '" (' . implode(', ', $columns) . ') VALUES (' . implode(', ', $params) . ')';
        $db->query($sql, $params2Values, static::class);

        $this->id = $db->getPdoConnection()->lastInsertId();
    }

    public function delete(): void
    {
        $db = Db::getInstance();
        $sql = 'DELETE FROM "' . static::getTableName() . '" WHERE "id" = :id';
        $db->query($sql, [':id' => $this->id], static::class);
    }

    abstract protected static function getTableName(): string;
}
