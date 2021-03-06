<?php

/**
 * Copyright © Bold Brand Commerce Sp. z o.o. All rights reserved.
 * See LICENSE.txt for license details.
 */

declare(strict_types = 1);

namespace Ergonode\Attribute\Domain\Event\Option;

use Ergonode\SharedKernel\Domain\Aggregate\AttributeId;
use Ergonode\Attribute\Domain\ValueObject\OptionKey;
use Ergonode\EventSourcing\Infrastructure\DomainEventInterface;
use JMS\Serializer\Annotation as JMS;
use Ergonode\SharedKernel\Domain\AggregateId;
use Ergonode\Core\Domain\ValueObject\TranslatableString;

/**
 */
class OptionCreatedEvent implements DomainEventInterface
{
    /**
     * @var AggregateId
     *
     * @JMS\Type("Ergonode\SharedKernel\Domain\AggregateId")
     */
    private AggregateId $id;

    /**
     * @var AttributeId
     *
     * @JMS\Type("Ergonode\SharedKernel\Domain\Aggregate\AttributeId")
     */
    private AttributeId $attributeId;

    /**
     * @var OptionKey
     *
     * @JMS\Type("Ergonode\Attribute\Domain\ValueObject\OptionKey")
     */
    private OptionKey $code;

    /**
     * @var TranslatableString
     *
     * @JMS\Type("Ergonode\Core\Domain\ValueObject\TranslatableString")
     */
    private TranslatableString $label;

    /**
     * @param AggregateId        $id
     * @param AttributeId        $attributeId
     * @param OptionKey          $code
     * @param TranslatableString $label
     */
    public function __construct(AggregateId $id, AttributeId $attributeId, OptionKey $code, TranslatableString $label)
    {
        $this->id = $id;
        $this->attributeId = $attributeId;
        $this->code = $code;
        $this->label = $label;
    }

    /**
     * @return AggregateId
     */
    public function getAggregateId(): AggregateId
    {
        return $this->id;
    }

    /**
     * @return AttributeId
     */
    public function getAttributeId(): AttributeId
    {
        return $this->attributeId;
    }

    /**
     * @return OptionKey
     */
    public function getCode(): OptionKey
    {
        return $this->code;
    }

    /**
     * @return TranslatableString
     */
    public function getLabel(): TranslatableString
    {
        return $this->label;
    }
}
