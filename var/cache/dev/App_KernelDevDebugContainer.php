<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerWGf586Z\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerWGf586Z/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerWGf586Z.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerWGf586Z\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerWGf586Z\App_KernelDevDebugContainer([
    'container.build_hash' => 'WGf586Z',
    'container.build_id' => '3a1a43a9',
    'container.build_time' => 1711656208,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerWGf586Z');