    <div class="main">
        <div class="content">
            <div class="content_top">
                <div class="heading">
                    <h3>Feature Products</h3>
                </div>
                <form>
                    <div class="apply">
                        <button>Apply</button>
                    </div>
                    <div class="sort">
                        <p>Sort by:
                            <select>
                                <option>Lowest Price</option>
                                <option>Highest Price</option>
                            </select>
                        </p>
                    </div>
                    <div class="show">
                        <p>Show:
                            <select>
                                <option>4</option>
                                <option>8</option>
                                <option>12</option>
                                <option>16</option>
                            </select>
                        </p>
                    </div>
                </form>
                <div class="clear"></div>
            </div>
            <div class="section group">
                <?php
                $products = $params['products'];
                ?>
                <?php foreach ($products as $product): ?>
                    <div class="grid_1_of_4 images_1_of_4">
                        <a href="#"><img src="<?= $product->getImage() ?>" alt="" /></a>
                        <h2><?= $product->getName() ?></h2>
                        <p><?= $product->getAbout() ?></p>
                        <p>
                            <span class="strike">$<?= $product->getPrice() ?></span>
                            <span class="price">$</span><?= $product->getCurrentPrice() ?></span>
                        </p>
                        <div class="button">
                            <span>
                                <img src="images/cart.jpg" alt="" />
                                <a href="/cart/add?id=<?=$product->getId()?>&back=<?=$params['uri']?>
                                " class="cart-button">Add to Cart</a>
                            </span>
                        </div>
                        <div class="button"><span><a href="#" class="details">Details</a></span></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>