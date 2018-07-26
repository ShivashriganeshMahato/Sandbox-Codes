<?php
/**
 * Create database connection and express functions for operating on db
 *
 * @author Shivashriganesh Mahato
 */

use \MongoDB\Driver\Manager;
use \MongoDB\Driver\Query;
use \MongoDB\Driver\BulkWrite;
use \MongoDB\Driver\Exception\Exception;
use \MongoDB\BSON\ObjectId;

$man = new Manager("mongodb://localhost:27017"/*, ['username' => 'sandbox', 'password' => 'NhJLmHZb$', 'db' => 'admin']*/);

abstract class Operators
{
    const Set = '$set';
    const Unset = '$unset';
    const Increment = '$inc';
    const Push = '$push';
    const Pull = '$pull';
}

/**
 * @param $man Manager
 * @param $collection string
 * @param $filter array
 * @param $options array
 * @return array
 */
function getDocuments($man, $collection, $filter, $options) {
    $query = new Query($filter, $options);
    try {
        $docs = array();
        $cursor = $man->executeQuery("sandbox.$collection", $query);
        foreach ($cursor as $doc) {
            $docs[] = $doc;
        }
        return $docs;
    } catch (Exception $ex) {
        printf("Error: %s\n", $ex->getMessage());
        exit;
    }
}

/**
 * @param $man Manager
 * @param $collection string
 * @param $document array
 * @return \MongoDB\Driver\WriteResult
 */
function insertDocument($man, $collection, $document) {
    $writer = new BulkWrite();
    $writer->insert($document);
    return $man->executeBulkWrite("sandbox.$collection", $writer);
}

/**
 * @param $man Manager
 * @param $collection string
 * @param $filter array
 * @param $operator string
 * @param $update array
 * @return \MongoDB\Driver\WriteResult
 */
function updateDocument($man, $collection, $filter, $operator, $update) {
    $writer = new BulkWrite();
    $writer->update($filter, [$operator => $update], ['upsert' => true]);
    return $man->executeBulkWrite("sandbox.$collection", $writer);
}

/**
 * @param $man Manager
 * @param $collection string
 * @param $filter array
 * @return \MongoDB\Driver\WriteResult
 */
function deleteDocument($man, $collection, $filter) {
    $writer = new BulkWrite();
    $writer->delete($filter);
    return $man->executeBulkWrite("sandbox.$collection", $writer);
}