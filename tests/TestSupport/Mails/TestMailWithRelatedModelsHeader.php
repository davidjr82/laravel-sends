<?php

declare(strict_types=1);

namespace Wnx\Sends\Tests\TestSupport\Mails;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Wnx\Sends\Support\StoreMailables;
use Wnx\Sends\Tests\TestSupport\Models\TestModel;

class TestMailWithRelatedModelsHeader extends Mailable
{
    use StoreMailables;
    use SerializesModels;

    public function __construct(private TestModel $testModel)
    {
    }

    public function build()
    {
        return $this
            ->associateWith([$this->testModel])
            ->view('emails.test')
            ->subject("::subject::");
    }
}
