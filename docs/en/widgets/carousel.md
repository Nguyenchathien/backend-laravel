# Carousel

`CODE4FUN\Admin\Widgets\Carousel`Used to generate carousel components:

```php
use CODE4FUN\Admin\Widgets\Carousel;

$items = [
    [
        'image' => 'http://xxxx/xxx.jpg',
        'caption' => 'xxxx',
    ],
    [
        'image' => 'http://xxxx/xxx.jpg',
        'caption' => 'xxxx',
    ],
    [
        'image' => 'http://xxxx/xxx.jpg',
        'caption' => 'xxxx',
    ],
];

$carousel = new Carousel($items);

echo $carousel->render();
```

The `Carousel::__construct($items)`, `$items` parameter sets the content element of the sliding album.


