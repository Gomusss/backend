<?php

/**
 * Copyright © Bold Brand Commerce Sp. z o.o. All rights reserved.
 * See LICENSE.txt for license details.
 */

declare(strict_types = 1);

namespace Ergonode\Core\Persistence\Dbal\Projector\Unit;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\Exception\InvalidArgumentException;
use Ergonode\Core\Domain\Event\UnitDeletedEvent;

/**
 */
class UnitDeletedEventProjector
{
    private const TABLE = 'unit';

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
     * @param UnitDeletedEvent $event
     *
     * @throws DBALException
     * @throws InvalidArgumentException
     */
    public function __invoke(UnitDeletedEvent $event): void
    {
        $this->connection->delete(
            self::TABLE,
            [
                'id' => $event->getAggregateId()->getValue(),
            ]
        );
    }
}
