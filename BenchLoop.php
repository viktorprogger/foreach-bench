<?php

declare(strict_types=1);


class BenchLoop
{
    private const COUNT = 1000000;
    private array $a = [];

    public function __construct()
    {
        for ($i = 0; $i < self::COUNT; $i++) {
            $a[] = new class{};
        }
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchForeach(): void
    {
        $c = [];
        foreach ($this->a as $b) {
            $c[] = $b;
        }
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchFor(): void
    {
        $c = [];
        for ($j = count($this->a) - 1; $j >= 0; $j--) {
            $c[] = $this->a[$j];
        }
    }
}
