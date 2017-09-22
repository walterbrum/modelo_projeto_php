<?php
use PHPUnit\Framework\TestCase;
use Vendor\Model\Classe;

class ClasseTest extends TestCase
{
    public function testInstanciacao()
    {
        $this->assertInstanceOf(Classe::class, new Classe);
    }
}