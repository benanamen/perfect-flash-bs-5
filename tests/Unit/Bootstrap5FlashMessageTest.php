<?php declare(strict_types=1);

namespace Tests\Unit;

use PerfectApp\Bootstrap5FlashMessage;
use PerfectApp\Session\SessionInterface;
use Codeception\Test\Unit;

class Bootstrap5FlashMessageTest extends Unit
{
    private SessionInterface $session;
    private array $messages;

    protected function setUp(): void
    {
        $this->session = $this->createMock(SessionInterface::class);
        $this->messages = [
            'success' => ['insert' => 'Record Inserted'],
            'danger' => ['failed_login' => 'Invalid Login'],
        ];
    }

    public function testAddMessage(): void
    {
        $this->session->expects($this->once())
            ->method('set')
            ->with(
                $this->equalTo('flash_messages'),
                $this->equalTo([
                    [
                        'type' => 'success',
                        'message' => 'Record Inserted',
                        'dismissible' => false,
                        'icon' => null
                    ]
                ])
            );

        $flash = new Bootstrap5FlashMessage($this->session, $this->messages);
        $flash->addMessage('success', 'insert');
    }

    public function testAddMessageWithIconAndDismissible(): void
    {
        $this->session->expects($this->once())
            ->method('set')
            ->with(
                $this->equalTo('flash_messages'),
                $this->equalTo([
                    [
                        'type' => 'danger',
                        'message' => 'Invalid Login',
                        'dismissible' => true,
                        'icon' => 'bi-x-circle'
                    ]
                ])
            );

        $flash = new Bootstrap5FlashMessage($this->session, $this->messages);
        $flash->addMessage('danger', 'failed_login', 'bi-x-circle', true);
    }

    public function testDisplayMessages(): void
    {
        $this->session->expects($this->once())
            ->method('get')
            ->with($this->equalTo('flash_messages'))
            ->willReturn([
                [
                    'type' => 'success',
                    'message' => 'Record Inserted',
                    'dismissible' => false,
                    'icon' => null
                ]
            ]);

        $this->session->expects($this->once())
            ->method('delete')
            ->with($this->equalTo('flash_messages'));

        $flash = new Bootstrap5FlashMessage($this->session, $this->messages);

        $this->expectOutputString('<div class="alert alert-success " role="alert">Record Inserted</div>');
        $flash->displayMessages();
    }

    public function testAddMessageWithNonExistentTypeAndKey(): void
    {
        $this->session->expects($this->never())
            ->method('set');

        $flash = new Bootstrap5FlashMessage($this->session, $this->messages);

        // Call addMessage with non-existent type and key
        $flash->addMessage('nonExistentType', 'nonExistentKey');
    }
}
