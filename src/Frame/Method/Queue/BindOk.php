<?php declare(strict_types=1);

namespace Benit8\Ampqp\Frame\Method\Queue;

use Benit8\Ampqp\Connection\Buffer;
use Benit8\Ampqp\Frame\Method as MethodFrame;
use Benit8\Ampqp\Frame\Method\ClassId;

final class BindOk extends MethodFrame
{
	public function __construct(int $channelId)
	{
		parent::__construct($channelId, ClassId::Queue, Method::BindOk);
	}

	protected static function unpack(int $channelId, Buffer $buffer): self
	{
		return new self($channelId);
	}
}
