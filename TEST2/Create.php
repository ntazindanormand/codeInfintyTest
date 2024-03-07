<?php

require 'vendor/autoload.php';
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Schema\Schema;

$connection = DriverManager::getConnection([
    'driver' => 'pdo_sqlite',
    'path' => 'db.sqlite',
]);

$schema = new Schema();
$table = $schema->createTable("csv_import");
$table->addColumn("id", "integer", ["unsigned" => true, "autoincrement" => true]);
$table->addColumn("name", "string", ["length" => 32]);
$table->addColumn("surname", "string", ["length" => 32]);
$table->addColumn("initials", "string", ["length" => 4]);
$table->addColumn("age", "integer", ["unsigned" => true]);
$table->addColumn("dateofbirth", "string", ["length" => 32]);
$table->setPrimaryKey(["id"]);

$queries = $schema->toSql($connection->getDatabasePlatform());
foreach ($queries as $query) {
    $connection->executeQuery($query);
}

echo "Table created successfully.";
