<?php
function get_products() {
  return [
    '1' => [
      'title' => 'Лампа Мсеюлида',
      'url' => 'img/item-mseyulida.jpg',
    ],

    '2' => [
      'title' => 'Диван Рмаериби',
      'url' => 'img/item-rmaeribi.jpg',
    ],

    '3' => [
      'title' => 'Люстра Блетуб',
      'url' => 'img/item-bletub.jpg',
    ],

    '4' => [
      'title' => 'Рабочий стол Ннулм',
      'url' => 'img/item-nnulm.jpg',
    ],

    '5' => [
      'title' => 'Подвесная кровать Асусмер',
      'url' => 'img/item-asusmer.jpg',
    ],

    '6' => [
      'title' => 'Набор мебели Тре',
      'url' => 'img/item-tre.jpg',
    ],

    '7' => [
      'title' => 'Люстра как у бабушки',
      'url' => 'img/item-default-old-lamp.jpg',
    ],

    '8' => [
      'title' => 'Лампа Дo',
      'url' => 'img/item-do.jpg',
    ],

    '9' => [
      'title' => 'Печатная машинка Епеус',
      'url' => 'img/item-epeus.jpg',
    ],

    '10' => [
      'title' => 'Стикеры Блемпере',
      'url' => 'img/item-blempere.jpg',
    ],

    '11' => [
      'title' => 'Панно Туета',
      'url' => 'img/item-tueta.jpg',
    ],

    '12' => [
      'title' => 'Органайзер Бреирбери',
      'url' => 'img/item-breirberi.jpg',
    ],

    '13' => [
      'title' => 'Подушка Нмяо',
      'url' => 'img/item-nmyao.jpg',
    ],

    '14' => [
      'title' => 'Лампа Кел',
      'url' => 'img/item-kel.jpg',
    ],

    '15' => [
      'title' => 'Подушка Омасе',
      'url' => 'img/item-omase.jpg',
    ],

    '16' => [
      'title' => 'Корзина Орму',
      'url' => 'img/item-ormu.jpg',
    ],

    '17' => [
      'title' => 'Скрепки Пинас',
      'url' => 'img/item-pinas.jpg',
    ],

    '18' => [
      'title' => 'Компакт-кассета Преум',
      'url' => 'img/item-preum.jpg',
    ],

    '19' => [
      'title' => 'Кресло Бадета',
      'url' => 'img/item-badeta.jpg',
    ],

    '20' => [
      'title' => 'Сувенир Рмоб',
      'url' => 'img/item-rmob.jpg',
    ],

    '21' => [
      'title' => 'Люстра Ткуоко',
      'url' => 'img/item-tkuoko.jpg',
    ],

    '22' => [
      'title' => 'Кресла Бриатуо',
      'url' => 'img/item-briatuo.jpg',
    ]
  ];
}

function get_product_attribute($id, $attr) {
  $products = get_products();
  $result = $products[$id][$attr] ?? null;
  return $result;
}

function get_product_title($id) {
  return get_product_attribute($id, 'title');
}

function get_img_url($id) {
  return get_product_attribute($id, 'url');
}
