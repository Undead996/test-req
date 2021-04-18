<?php


use Model\Brand;
use PHPUnit\Framework\TestCase;


class BrandTest extends TestCase
{
   public function testAllGetters(): void
   {
       $id = 1;
       $name = 'Имя';
       $sort = 3;
       $description = 'Описание';

       $brand = new Brand(
           $id,
           $name,
           $sort,
           $description,
       );

       $this->assertEquals($id, $brand->getId());
       $this->assertEquals($name, $brand->getName());
       $this->assertEquals($sort, $brand->getSort());
       $this->assertEquals($description, $brand->getDescription());
   }
}