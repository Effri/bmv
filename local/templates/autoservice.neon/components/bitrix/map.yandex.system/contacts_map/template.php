<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$this->setFrameMode(true);
?>
<script type="text/javascript">

if (!window.GLOBAL_arMapObjects)
	window.GLOBAL_arMapObjects = {};

function init_<?echo $arParams['MAP_ID']?>()
{
	if (!window.ymaps)
		return;

	if(typeof window.GLOBAL_arMapObjects['<?echo $arParams['MAP_ID']?>'] !== "undefined")
		return;

	var node = BX("BX_YMAP_<?echo $arParams['MAP_ID']?>");
	node.innerHTML = '';

	var map = window.GLOBAL_arMapObjects['<?echo $arParams['MAP_ID']?>'] = new ymaps.Map(node, {
        zoom:14,
	    center: [<?echo $arParams['INIT_MAP_LAT']?>, <?echo $arParams['INIT_MAP_LON']?>],
		type: 'yandex#<?=$arResult['ALL_MAP_TYPES'][$arParams['INIT_MAP_TYPE']]?>',
        controls: []
	});

    var polygonLayout = ymaps.templateLayoutFactory.createClass('<div class="placemark_layout_container"><i class="fa fa-map-marker" aria-hidden="true"></i></div>'),
    BalloonContentLayout = ymaps.templateLayoutFactory.createClass(
        '<div class="placemark_baloon_container">' +
            '<div class="placemark_baloon_header">{{properties.address}}</div>' +
            '<div class="placemark_baloon_info"><i class="fa fa-clock-o" aria-hidden="true"></i>{{properties.time}}</div>' +
            '<div class="placemark_baloon_info"><i class="fa fa-phone" aria-hidden="true"></i>{{properties.phone}}</div>' +
        '</div>'
    );
    markerArray.forEach(function(item, i, arr){
        map.geoObjects.add(new ymaps.Placemark(item.coord, {
            address: item.address,
            time: item.time,
            phone: item.phone
        },{
            balloonContentLayout: BalloonContentLayout,
            balloonPanelMaxMapArea: 0,
            iconLayout: polygonLayout,
            iconOffset: [-13, -44],
            iconShape: {   
                type: 'Polygon',
                coordinates: [
                    [[10,2],[16,2],[26,10],[26,20],[18,40],[8,40],[0,20],[0,10]]
                ]
            },
            openBalloonOnClick: true
        }));
    });
    var myPolyline = new ymaps.Polyline([
        // Указываем координаты вершин ломаной.
        [59.923900, 30.385878],
        [59.923798, 30.385138],
        [59.925933, 30.379119],
        [59.923787, 30.375922],
        [59.923165, 30.377599],
        [59.922883, 30.377752]
    ], {
        // Описываем свойства геообъекта.
        // Содержимое балуна.
         //balloonContent: "Ломаная линия"
    }, {
        // Задаем опции геообъекта.
        // Отключаем кнопку закрытия балуна.
        //balloonCloseButton: false,
        // Цвет линии.
        strokeColor: "#eb4034",
        // Ширина линии.
        strokeWidth: 4,
        // Коэффициент прозрачности.
        strokeOpacity: 1
    });
    var myPolyline2 = new ymaps.Polyline([
        // Указываем координаты вершин ломаной.
        [59.915020, 30.350029],
        [59.914309, 30.354071],
        [59.913713, 30.359586],
        [59.913577, 30.363574],
        [59.913848, 30.369318],
        [59.914451, 30.374725],
        [59.916938, 30.374658],
        [59.924438, 30.371964],
        [59.924949, 30.372647],
        [59.923178, 30.377615],
        [59.922873, 30.377763]
    ], {
        // Описываем свойства геообъекта.
        // Содержимое балуна.
        //balloonContent: "Ломаная линия"
    }, {
        // Задаем опции геообъекта.
        // Отключаем кнопку закрытия балуна.
        //balloonCloseButton: false,
        // Цвет линии.
        strokeColor: "#070bf0",
        // Ширина линии.
        strokeWidth: 4,
        // Коэффициент прозрачности.
        strokeOpacity: 1
    });

    map.setBounds(map.geoObjects.add(myPolyline).add(myPolyline2).getBounds(), {checkZoomRange:false}).then(function(){ map.setZoom(14);});





<?
foreach ($arResult['ALL_MAP_OPTIONS'] as $option => $method)
{
	if (in_array($option, $arParams['OPTIONS'])):
?>
	map.behaviors.enable("<?echo $method?>");
<?
	else:
?>
	if (map.behaviors.isEnabled("<?echo $method?>"))
		map.behaviors.disable("<?echo $method?>");
<?
	endif;
}

foreach ($arResult['ALL_MAP_CONTROLS'] as $control => $method)
{
	if (in_array($control, $arParams['CONTROLS'])):
?>
	map.controls.add('<?=$method?>');
<?
	endif;
}


if ($arParams['DEV_MODE'] == 'Y'):
?>
	window.bYandexMapScriptsLoaded = true;
<?
endif;

if ($arParams['ONMAPREADY']):
?>
	if (window.<?echo $arParams['ONMAPREADY']?>)
	{
<?
	if ($arParams['ONMAPREADY_PROPERTY']):
?>
		<?echo $arParams['ONMAPREADY_PROPERTY']?> = map;
		window.<?echo $arParams['ONMAPREADY']?>();
<?
	else:
?>
		window.<?echo $arParams['ONMAPREADY']?>(map);
<?
	endif;
?>
	}
<?
endif;
?>
}
<?
if ($arParams['DEV_MODE'] == 'Y'):
?>
function BXMapLoader_<?echo $arParams['MAP_ID']?>()
{
	if (null == window.bYandexMapScriptsLoaded)
	{
		function _wait_for_map(){
			if (window.ymaps && window.ymaps.Map)
				init_<?echo $arParams['MAP_ID']?>();
			else
				setTimeout(_wait_for_map, 50);
		}

		BX.loadScript('<?=$arResult['MAPS_SCRIPT_URL']?>', _wait_for_map);
	}
	else
	{
		init_<?echo $arParams['MAP_ID']?>();
	}
}
<?
	if ($arParams['WAIT_FOR_EVENT']):
?>
	<?=CUtil::JSEscape($arParams['WAIT_FOR_EVENT'])?> = BXMapLoader_<?=$arParams['MAP_ID']?>;
<?
	elseif ($arParams['WAIT_FOR_CUSTOM_EVENT']):
?>
	BX.addCustomEvent('<?=CUtil::JSEscape($arParams['WAIT_FOR_EVENT'])?>', BXMapLoader_<?=$arParams['MAP_ID']?>);
<?
	else:
?>
	BX.ready(BXMapLoader_<?echo $arParams['MAP_ID']?>);
<?
	endif;
else: // $arParams['DEV_MODE'] == 'Y'
?>

(function bx_ymaps_waiter(){
	if(typeof ymaps !== 'undefined')
		ymaps.ready(init_<?echo $arParams['MAP_ID']?>);
	else
		setTimeout(bx_ymaps_waiter, 100);
})();

<?
endif; // $arParams['DEV_MODE'] == 'Y'
?>

/* if map inits in hidden block (display:none)
*  after the block showed
*  for properly showing map this function must be called
*/
function BXMapYandexAfterShow(mapId)
{

	if(window.GLOBAL_arMapObjects[mapId] !== undefined)
		window.GLOBAL_arMapObjects[mapId].container.fitToViewport();
}

</script>
<div id="BX_YMAP_<?echo $arParams['MAP_ID']?>" class="bx-yandex-map" style="height: <?echo $arParams['MAP_HEIGHT'];?>; width: <?echo $arParams['MAP_WIDTH']?>;"><?echo GetMessage('MYS_LOADING'.($arParams['WAIT_FOR_EVENT'] ? '_WAIT' : ''));?></div>