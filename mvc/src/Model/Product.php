<?php


namespace Model;


use Valitron\Validator;

class Product
{
    public function __construct(
        private int $id,
        private string $name,
        private string $about,
        private float $price,
        private int $sort,
        private int $quantity,
        private ?int $discount,
        private ?int $rating,
        private string $image,
        private int $brandId,
    ){}

    public static function validate(array $data): array
    {
        $v = new Validator($data);
        $v->rules([
            'required' => [
                ['name'],
                ['about'],
                ['price'],
                ['sort'],
                ['quantity'],
                ['image'],
                ['brandId'],
            ],
            'numeric' => [
                ['price']
            ],
            'lengthMax' => [
                ['name', 127],
            ],
            'integer' => [
                ['sort'],
                ['quantity'],
                ['brandId'],
            ],
        ]);
        $isValid = $v->validate();
        if ($isValid) {
            return [];
        }
        return $v->errors();
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAbout(): string
    {
        return $this->about;
    }

    /**
     * @param string $about
     */
    public function setAbout(string $about): void
    {
        $this->about = $about;
    }

    public function getSort(): int
    {
        return $this->sort;
    }

    /**
     * @return float
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * @param float $quantity
     */
    public function setQuantity(float $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getCurrentPrice(): float
    {
        if (is_null($this->discount)) {
            return $this->price;
        }
        return $this->price * (1 - $this->discount/100);
    }

    public function getBrandId(): int
    {
        return $this->brandId;
    }

    public static function getById(int $id, $db): static
    {
        $dbRes = $db->query('SELECT * FROM product WHERE id='.$id);
        $product = $dbRes->fetch_assoc();
        return new static(
            $product['id'],
            $product['name'],
            $product['about'],
            $product['price'],
            $product['sort'],
            $product['quantity'],
            $product['discount'],
            $product['rating'],
            $product['image'],
            $product['brand_id'],
        );
    }

    public static function getAll($db): array
    {
        $dbRes = $db->query('SELECT * FROM product');
        $products = [];
        while($product = $dbRes->fetch_assoc()) {
            $products[] = new static(
                $product['id'],
                $product['name'],
                $product['about'],
                $product['price'],
                $product['sort'],
                $product['quantity'],
                $product['discount'],
                $product['rating'],
                $product['image'],
                $product['brand_id'],
            );
        };
        return $products;
    }

    public static function getByIds(array $ids, $db): array
    {
        $idsString = implode(',', $ids);
        $dbRes = $db->query("SELECT * FROM product WHERE id IN($idsString)");
        $products = [];
        while($product = $dbRes->fetch_assoc()) {
            $products[] = new static(
                $product['id'],
                $product['name'],
                $product['about'],
                $product['price'],
                $product['sort'],
                $product['quantity'],
                $product['discount'],
                $product['rating'],
                $product['image'],
                $product['brand_id'],
            );
        };
        return $products;
    }
}

