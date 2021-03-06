<?php
/**
 * Copyright © Bold Brand Commerce Sp. z o.o. All rights reserved.
 * See LICENSE.txt for license details.
 */

declare(strict_types = 1);

namespace Ergonode\Attribute\Persistence\Dbal\Projector\Attribute;

use Doctrine\DBAL\Connection;
use Ergonode\Attribute\Domain\Event\Attribute\AttributeScopeChangedEvent;

/**
 */
class AttributeScopeChangedEventProjector
{
    private const TABLE = 'attribute';

    /**
     * @var Connection
     */
    private Connection $connection;

    /**
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param AttributeScopeChangedEvent $event
     *
     * @throws \Doctrine\DBAL\DBALException
     */
    public function __invoke(AttributeScopeChangedEvent $event): void
    {
        if (!empty($event->getTo())) {
            $this->connection->update(
                self::TABLE,
                [
                    'scope' => $event->getTo()->getValue(),
                ],
                [
                    'id' => $event->getAggregateId()->getValue(),
                ]
            );
        }
    }
}
