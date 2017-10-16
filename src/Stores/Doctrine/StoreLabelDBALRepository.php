<?php

namespace CultuurNet\TransformEntryStore\Stores\Doctrine;

use CultuurNet\TransformEntryStore\Stores\LabelInterface;
use ValueObjects\StringLiteral\StringLiteral;

class StoreLabelDBALRepository extends AbstractDBALRepository implements LabelInterface
{
    /**
     * @inheritdoc
     */
    public function addLabel(StringLiteral $externalId, StringLiteral $label)
    {
        $queryBuilder = $this->createQueryBuilder();

        $queryBuilder->insert($this->getTableName()->toNative())
            ->values([
                SchemaLabelConfigurator::EXTERNAL_ID_COLUMN => '?',
                SchemaLabelConfigurator::LABEL_COLUMN => '?'
            ])
            ->setParameters([
                $externalId,
                $label
            ]);

        $queryBuilder->execute();
    }

    /**
     * @inheritdoc
     */
    public function deleteLabel(StringLiteral $externalId, StringLiteral $label)
    {
        $queryBuilder = $this->createQueryBuilder();
        
        $queryBuilder->delete($this->getTableName()->toNative())
            ->values([
                SchemaLabelConfigurator::EXTERNAL_ID_COLUMN => '?',
                SchemaLabelConfigurator::LABEL_COLUMN => '?'
            ])
            ->setParameters([
                $externalId,
                $label
            ]);

        $queryBuilder->execute();
    }
}
