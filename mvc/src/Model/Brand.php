<?php


namespace Model;


use Valitron\Validator;

class Brand
{
    public function __construct(
        private int $id,
        private string $name,
        private int $sort,
        private string $description,
    ){}

    public static function validate(array $data): array
    {
        $v = new Validator($data);
        $v->rules([
            'required' => [
                ['name'],
                ['description'],
                ['sort'],
            ],
            'lengthMax' => [
                ['name', 127],
                ['description', 512]
            ],
            'integer' => [
                ['sort']
            ],
        ]);
        $isValid = $v->validate();
        if ($isValid) {
            return [];
        }
        return $v->errors();
    }

    public function getId():int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSort(): int
    {
        return $this->sort;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}