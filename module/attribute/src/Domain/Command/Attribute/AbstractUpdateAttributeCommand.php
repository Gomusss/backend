<?php

/**
 * Copyright © Bold Brand Commerce Sp. z o.o. All rights reserved.
 * See LICENSE.txt for license details.
 */

declare(strict_types = 1);

namespace Ergonode\Attribute\Domain\Command\Attribute;

use Ergonode\Attribute\Domain\ValueObject\AttributeScope;
use Ergonode\Core\Domain\ValueObject\TranslatableString;
use Ergonode\EventSourcing\Infrastructure\DomainCommandInterface;
use Ergonode\SharedKernel\Domain\Aggregate\AttributeId;
use JMS\Serializer\Annotation as JMS;

/**
 */
abstract class AbstractUpdateAttributeCommand implements DomainCommandInterface
{
    /**
     * @var AttributeId
     *
     * @JMS\Type("Ergonode\SharedKernel\Domain\Aggregate\AttributeId")
     */
    private AttributeId $id;

    /**
     * @var AttributeScope
     *
     * @JMS\Type("Ergonode\Attribute\Domain\ValueObject\AttributeScope")
     */
    private AttributeScope $scope;

    /**
     * @var array
     *
     * @JMS\Type("array")
     */
    private array $groups;

    /**
     * @var TranslatableString
     *
     * @JMS\Type("Ergonode\Core\Domain\ValueObject\TranslatableString")
     */
    private TranslatableString $label;

    /**
     * @var TranslatableString
     *
     * @JMS\Type("Ergonode\Core\Domain\ValueObject\TranslatableString")
     */
    private TranslatableString $hint;

    /**
     * @var TranslatableString
     *
     * @JMS\Type("Ergonode\Core\Domain\ValueObject\TranslatableString")
     */
    private TranslatableString $placeholder;

    /**
     * @param AttributeId        $id
     * @param TranslatableString $label
     * @param TranslatableString $hint
     * @param TranslatableString $placeholder
     * @param AttributeScope     $scope
     * @param array              $groups
     */
    public function __construct(
        AttributeId $id,
        TranslatableString $label,
        TranslatableString $hint,
        TranslatableString $placeholder,
        AttributeScope $scope,
        array $groups = []
    ) {
        $this->id = $id;
        $this->scope = $scope;
        $this->label = $label;
        $this->hint = $hint;
        $this->placeholder = $placeholder;
        $this->groups = $groups;
    }

    /**
     * @return AttributeId
     */
    public function getId(): AttributeId
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getGroups(): array
    {
        return $this->groups;
    }

    /**
     * @return TranslatableString
     */
    public function getLabel(): TranslatableString
    {
        return $this->label;
    }

    /**
     * @return TranslatableString
     */
    public function getHint(): TranslatableString
    {
        return $this->hint;
    }

    /**
     * @return TranslatableString
     */
    public function getPlaceholder(): TranslatableString
    {
        return $this->placeholder;
    }

    /**
     * @return AttributeScope
     */
    public function getScope(): AttributeScope
    {
        return $this->scope;
    }
}
