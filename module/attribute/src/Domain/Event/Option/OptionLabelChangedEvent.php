<?php

/**
 * Copyright © Bold Brand Commerce Sp. z o.o. All rights reserved.
 * See LICENSE.txt for license details.
 */

declare(strict_types = 1);

namespace Ergonode\Attribute\Domain\Event\Option;

use Ergonode\EventSourcing\Infrastructure\DomainEventInterface;
use JMS\Serializer\Annotation as JMS;
use Ergonode\SharedKernel\Domain\AggregateId;
use Ergonode\Core\Domain\ValueObject\TranslatableString;

/**
 */
class OptionLabelChangedEvent implements DomainEventInterface
{
    /**
     * @var AggregateId
     *
     * @JMS\Type("Ergonode\SharedKernel\Domain\AggregateId")
     */
    private AggregateId $id;

    /**
     * @var TranslatableString
     *
     * @JMS\Type("Ergonode\Core\Domain\ValueObject\TranslatableString")
     */
    private TranslatableString $from;

    /**
     * @var TranslatableString
     *
     * @JMS\Type("Ergonode\Core\Domain\ValueObject\TranslatableString")
     */
    private TranslatableString $to;

    /**
     * @param AggregateId        $id
     * @param TranslatableString $from
     * @param TranslatableString $to
     */
    public function __construct(AggregateId $id, TranslatableString $from, TranslatableString $to)
    {
        $this->id = $id;
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * @return AggregateId
     */
    public function getAggregateId(): AggregateId
    {
        return $this->id;
    }

    /**
     * @return TranslatableString
     */
    public function getFrom(): TranslatableString
    {
        return $this->from;
    }

    /**
     * @return TranslatableString
     */
    public function getTo(): TranslatableString
    {
        return $this->to;
    }
}
