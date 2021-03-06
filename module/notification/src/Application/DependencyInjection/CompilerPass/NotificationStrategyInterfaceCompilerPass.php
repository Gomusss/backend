<?php

/**
 * Copyright © Bold Brand Commerce Sp. z o.o. All rights reserved.
 * See LICENSE.txt for license details.
 */

declare(strict_types = 1);

namespace Ergonode\Notification\Application\DependencyInjection\CompilerPass;

use Ergonode\Notification\Infrastructure\Sender\NotificationSender;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 */
class NotificationStrategyInterfaceCompilerPass implements CompilerPassInterface
{
    public const TAG = 'component.notification.notification_strategy_interface';

    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container): void
    {
        if ($container->has(NotificationSender::class)) {
            $this->processProvider($container);
        }
    }

    /**
     * @param ContainerBuilder $container
     */
    private function processProvider(ContainerBuilder $container): void
    {
        $arguments = [];
        foreach ($container->findTaggedServiceIds(self::TAG) as $id => $strategy) {
            $arguments[] = new Reference($id);
        }

        $container->findDefinition(NotificationSender::class)->setArguments($arguments);
    }
}
