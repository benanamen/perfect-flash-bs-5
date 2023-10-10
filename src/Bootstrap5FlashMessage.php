<?php

declare(strict_types=1);

namespace PerfectApp;

use PerfectApp\Session\SessionInterface;

final class Bootstrap5FlashMessage
{
    private string $closeButtonHtml = <<<EOT
    <button type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close">
    </button>
EOT;

    public function __construct(
        private readonly SessionInterface $session,
        private readonly array            $messages
    ) {
    }

    public function addMessage(string $type, string $key, ?string $icon = null, bool $dismissible = false): void
    {
        $message = $this->messages[$type][$key] ?? '';
        if ($message === '') {
            return;
        }

        $flashMessages = $this->session->get('flash_messages') ?? [];
        $flashMessages[] = [
            'type' => $type,
            'message' => $message,
            'dismissible' => $dismissible,
            'icon' => $icon,
        ];
        $this->session->set('flash_messages', $flashMessages);
    }

    public function displayMessages(): void
    {
        $flashMessages = $this->session->get('flash_messages') ?? [];
        foreach ($flashMessages as $flashMessage) {
            $dismissibleClass = $flashMessage['dismissible'] ? 'alert-dismissible fade show' : '';
            $closeButton = $flashMessage['dismissible'] ? $this->closeButtonHtml : '';
            echo sprintf(
                '<div class="alert alert-%s %s" role="alert">%s%s%s</div>',
                $flashMessage['type'],
                $dismissibleClass,
                $flashMessage['icon'] ? "<i class='{$flashMessage['icon']}'></i> " : '',
                $flashMessage['message'],
                $closeButton
            );
        }
        $this->session->delete('flash_messages');
    }
}
