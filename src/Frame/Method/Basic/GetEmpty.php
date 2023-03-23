<?php declare(strict_types=1);

namespace Benit8\Ampqp\Frame\Method\Basic;

use Benit8\Ampqp\Connection\Buffer;
use Benit8\Ampqp\Frame\Method as MethodFrame;
use Benit8\Ampqp\Frame\Method\ClassId;

final class GetEmpty extends MethodFrame
{
	/**
	 * Constructor.
	 *
	 * @var int $channelId
	 * @var string $clusterId
	 */
	public function __construct(
		int $channelId,
		public readonly string $clusterId = '',
	) {
		parent::__construct($channelId, ClassId::Basic, Method::GetEmpty);
	}

	protected static function unpack(int $channelId, Buffer $buffer): self
	{
		return new self(
			$channelId,
			$buffer->consumeString(),
		);
	}

	protected function pack(): Buffer
	{
		return parent::pack()
			->appendString($this->clusterId);
	}
}
