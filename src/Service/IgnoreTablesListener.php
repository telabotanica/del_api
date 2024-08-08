<?php
namespace App\Service;
use Doctrine\ORM\Tools\Event\GenerateSchemaEventArgs;
use Doctrine\ORM\EntityMAnagerInterface;
 
/**
 * IgnoreTablesListener class
 */
class IgnoreTablesListener
{
    private $ignoredTables = [
        
        'del_image',
        'del_utilisateur_infos',
        'del_utilisateurs',
    ];
 
    /**
     * Remove ignored tables /entities from Schema
     * 
     * @param GenerateSchemaEventArgs $args
     */
    public function postGenerateSchema(GenerateSchemaEventArgs $args)
    {
        $schema = $args->getSchema();
        $em = $args->getEntityManager();
 
        $ignoredTables = $this->ignoredTables;
 
        // or prepare $ignoredTables array
        /* $ignoredTables = [];
        foreach ($this->ignoredEntities as $entityName) {
            $ignoredTables[] = $em->getClassMetadata($entityName)->getTableName();
        } */
        
        foreach ($schema->getTables() as $tableName) {
            var_dump($tableName->getName());
            if (in_array($tableName->getName(), $ignoredTables)) {
                // remove table from schema
                $schema->dropTable($tableName->getName());
            }
 
        }
    }
 
}