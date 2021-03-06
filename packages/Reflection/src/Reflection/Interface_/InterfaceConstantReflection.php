<?php declare(strict_types=1);

namespace ApiGen\Reflection\Reflection\Interface_;

use ApiGen\Reflection\Contract\Reflection\Interface_\InterfaceConstantReflectionInterface;
use ApiGen\Reflection\Contract\Reflection\Interface_\InterfaceReflectionInterface;

/**
 * @inspiration https://github.com/POPSuL/PHP-Token-Reflection/blob/develop/TokenReflection/Php/ReflectionConstant.php
 */
final class InterfaceConstantReflection implements InterfaceConstantReflectionInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var mixed
     */
    private $value;

    /**
     * @var InterfaceReflectionInterface
     */
    private $interfaceReflection;

    /**
     * @param mixed $value
     */
    private function __construct(string $name, $value, InterfaceReflectionInterface $interfaceReflection)
    {
        $this->name = $name;
        $this->value = $value;
        $this->interfaceReflection = $interfaceReflection;
    }

    /**
     * @param mixed $value
     */
    public static function createFromNameValueAndInterface(
        string $name,
        $value,
        InterfaceReflectionInterface $interfaceReflection
    ): self {
        return new self($name, $value, $interfaceReflection);
    }

    public function isPrivate(): bool
    {
        // @todo
        return false;
    }

    public function isProtected(): bool
    {
        // @todo
        return false;
    }

    public function isPublic(): bool
    {
        // @todo
        return false;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTypeHint(): string
    {
        $valueType = gettype($this->value);
        if ($valueType === 'integer') {
            return 'int';
        }

        return $valueType;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    public function isDeprecated(): bool
    {
    }

    public function getStartLine(): int
    {
    }

    public function getEndLine(): int
    {
    }

    public function getDeclaringInterfaceName(): string
    {
        $this->interfaceReflection->getName();
    }

    public function getDeclaringInterface(): InterfaceReflectionInterface
    {
        return $this->interfaceReflection;
    }
}
