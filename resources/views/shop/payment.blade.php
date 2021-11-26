@extends('layouts.layout-page')
@section('title', $info->meta_title)
@section('description', $info->meta_description)
@section('keywords', $info->meta_keywords)
@section('content')
<div id="information">
        <div class="m-grid">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="/">Главная</a></li>
                    <li><span>Оплата</span></li>
                </ul>
            </div>
        </div>
        <div class="m-grid">
            <div class="information-head">
                <h1>Оплата в нашем интернет магазине</h1>
                <p>Все поставляемые изделия проходят испытания на заводе-изготовителе, что позволяет гарантировать
                    качество и надежную эксплуатацию в течение гарантийного срока. На изделия «Название магазина»
                    предоставляется гарантия сроком 3 года с момента покупки изделия, при условии соблюдения правил
                    использования, монтажа, эксплуатации, транспортировки и хранения.
                    Гарантия включает все дефекты, которые имеют скрытый заводской брак и распространяется на всю
                    продукцию ТМ Волховец, а именно:
                    дверное полотно, дверная коробка, наличники, доборные элементы, соединительная планка, притворная
                    планка, порог, карниз, КЭП (комплект элементов портала), комплект раздвижной системы, фурнитуру,
                    приобретенную в компании «Название магазина».
                    В случае обнаружения дефектов, связанных с качеством изделия, необходимо обратиться к в магазин, в
                    котором была совершена покупка, и сообщить о выявленном дефекте.</p>
            </div>
            <div class="information-main">
                <h2>Заголовок второго уровня</h2>
                <ul>
                    <li>Претензии к качеству изделия могут быть предъявлены в течение гарантийного срока</li>
                    <li>Изделия, признанные браком обмениваются на новые без дополнительной платы.</li>
                    <li>Решение о замене изделия принимает завод-изготовитель.</li>
                    <li>Изделие с браком при этом переходит в собственность завода.</li>
                    <li>При совершении покупки клиент получает договор (кассовый чек), в котором указывается
                        номенклатура приобретаемых изделий, дата продажи, адрес магазина, в котором совершается покупка
                        и его телефон. В договоре обязательно должны быть подписи продавца и покупателя.</li>
                </ul>
            </div>
            <div class="information-main">
                <h2>Заголовок второго уровня</h2>
                <ul>
                    <li>Нарушения требований по монтажу, хранению и эксплуатации изделия.</li>
                    <li>Ненадлежащей транспортировки и погрузочно-разгрузочных работ.</li>
                    <li>Наличие повреждений, вызванных чрезвычайными ситуациями, природными стихиями и другими
                        форс-мажорными обстоятельствами.</li>
                    <li>Наличие механических повреждений в результате удара, падения, взаимодействия с любыми острыми
                        предметами, порчи животными.</li>
                    <li>Наличие следов постороннего вмешательства в конструкцию изделия.</li>
                    <li>Наличие факта, связанного с разнотональностью и рисунком шпона, массива.</li>
                    <li>Брак фурнитуры (ручек, петель, замков) и комплектующих, не поставляемых производителем.</li>
                    <li>Истечение гарантийного срока.</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
