<?php
namespace Aura\Router\Helper;

use Aura\Router\Exception\RouteNotFound;
use Aura\Router\RouterContainer;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class RouteRawTest extends TestCase
{
    protected $container;
    protected $map;
    protected $generator;

    protected function set_up()
    {
        parent::set_up();
        $container = new RouterContainer();
        $this->container = $container;
        $this->map = $container->getMap();
        $this->generator = $container->getGenerator();
    }

    public function testInvokeReturnsGeneratedRoute()
    {
        $this->map->route('test', '/blog/{id}/edit');

        $helper = $this->container->newRouteRawHelper();

        $this->assertEquals('/blog/4 2/edit', $helper('test', ['id' => '4 2', 'foo' => 'bar']));
    }

    public function testInvokeReturnsGeneratedRouteWithToken()
    {
        $this->map->route('test', '/blog/{id: \d+}/edit');

        $helper = $this->container->newRouteRawHelper();

        $this->assertEquals('/blog/42/edit', $helper('test', ['id' => 42, 'foo' => 'bar']));
    }

    public function testInvokeGenerateExceptionWithToken()
    {
        $this->map->route('test', '/blog/{id}/edit')
            ->tokens([
                'id' => '([0-9]+)',
            ]);

        $helper = $this->container->newRouteRawHelper();

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Parameter value for [id] did not match the regex `([0-9]+)`');
        $helper('test', ['id' => '4 2', 'foo' => 'bar']);
    }
}
