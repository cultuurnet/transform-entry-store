<?php

namespace CultuurNet\TransformEntryStore\Stores\Doctrine;

use CultuurNet\TransformEntryStore\Stores\ThemeRepositoryInterface;
use ValueObjects\StringLiteral\StringLiteral;
use ValueObjects\Identity\UUID;

class StoreThemeDBALRepository extends AbstractDBALRepository implements ThemeRepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function getThemeId(
        StringLiteral $externalId
    ) {
        $whereId = SchemaThemeConfigurator::EXTERNAL_ID_COLUMN . ' = :externalId';

        $queryBuilder = $this->createQueryBuilder();
        $queryBuilder->select(SchemaThemeConfigurator::THEME_ID_COLUMN)
            ->from($this->getTableName()->toNative())
            ->where($whereId)
            ->setParameter('externalId', $externalId);

        $statement = $queryBuilder->execute();
        $resultSet = $statement->fetchAll();

        if (empty($resultSet)) {
            return null;
        } else {
            return StringLiteral::fromNative($resultSet[0]['theme_id']);
        }
    }

    /**
     * @inheritdoc
     */
    public function saveThemeId(
        StringLiteral $externalId,
        StringLiteral $themeId
    ) {
        $queryBuilder = $this->createQueryBuilder();

        $queryBuilder->insert($this->getTableName()->toNative())
            ->values([

                SchemaThemeConfigurator::EXTERNAL_ID_COLUMN => '?',
                SchemaThemeConfigurator::THEME_ID_COLUMN => '?'
            ])
            ->setParameters([
                $externalId,
                $themeId
            ]);

        $queryBuilder->execute();
    }

    /**
     * @inheritdoc
     */
    public function updateThemeId(
        StringLiteral $externalId,
        StringLiteral $themeId
    ) {
        // TODO: Implement updateThemeId() method.
    }
}
