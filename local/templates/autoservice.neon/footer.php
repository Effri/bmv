<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
    <?if(!empty(str_replace(SITE_DIR, "", $APPLICATION->GetCurPage()))):?>
                        </div>
            <?$APPLICATION->AddBufferContent('ShowLeftMenuFooter');?>
        </div>
    <?endif;?>
    </div>
    <section id="bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md text_left">
                    <?=GetMessage('PRV_FOOTER_DEVELOPER')?> <a href="https://profitkit.ru/" class="link_dev" target="_blank" rel="nofollow">ProfitKit</a>
                </div>
                <div class="col-md text_center">
<!--                    <div class="company_name">ООО "Car Service", --><?//=date("Y");?><!--</div>-->
                    <div class="copyright"><?=GetMessage('PRV_FOOTER_COPYRIGHT')?></div>
                </div>
                <div class="col-md text_right">
                    <a href="<?=SITE_DIR;?>" class="logo">
                        <a class="navbar-brand" href="/">
                            <svg id="лого_в_кривых_Image" data-name="лого в кривых&nbsp;Image" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 219.19 54.18" width="121" height="51">
                                <defs>
                                    <style>
                                        .cls-1,.cls-2{fill:#fff;stroke-miterlimit:10;fill-rule:evenodd;}.cls-1{stroke:#000;}.cls-2{stroke:#020202;}
                                    </style>
                                </defs>
                                <title>logo</title>
                                <path class="cls-1" d="M131.08,18.17V71.33H105.29s0-11.57,0-17.27l-0.45-.2c-1.83,2.07-3.69,4.12-5.5,6.22-3,3.53-6,7.1-9.11,10.62a2,2,0,0,1-1.34.6l-22.43,0L65.83,71V53.6l-0.4-.19-7.09,8.93c-2,2.57-4,5.17-6.16,7.68a3.31,3.31,0,0,1-2.05,1.25c-8.5.08-17,.05-25.89,0.05,2.34-3,4.46-5.78,6.62-8.53q10.64-13.54,21.3-27.06c4.35-5.52,8.68-11,13.06-16.54a2.72,2.72,0,0,1,1.65-1c8.37,0,16.64,0,25,0,0.18,0,.42.25,0.84,0.38V36.14l0.44,0.13c2.76-2.72,17.3-16.69,19-18.07C118.6,18.17,124.63,18.17,131.08,18.17Z" transform="translate(-23.21 -17.65)"></path>
                                <path class="cls-1" d="M196.22,18.15h42.21c3,0,3.47.56,3.47,3.56q0,23.33,0,46.67c0,3-.38,2.95-3.26,2.95-13.31,0-26.73-.06-40,0-1.9,0-2.5-.3-2.5-2.12q0-24.82,0-49.64C196.11,19.25,196.16,18.76,196.22,18.15Zm14.65,13.12V58h10V31.27h-10Z" transform="translate(-23.21 -17.65)"></path>
                                <path class="cls-2" d="M141.27,55.46h13.54c0.05,1,.1,2.05.15,3.2h13.11V50.77H141.41c0-10.81,0-21.79,0-32.6h46.15c0,4.38.06,9.09,0.06,13.64H156.41v7.12H166c6.52,0,13,0,19.57,0,1.71,0,2.26.53,2.24,2.26q-0.12,14.13,0,28.27c0,1.7-.57,1.92-2.3,1.92-13.9,0-27.84,0-41.75,0-1.87,0-2.51-.32-2.49-2.17C141.31,64.63,141.27,60.1,141.27,55.46Z" transform="translate(-23.21 -17.65)"></path>
                            </svg>                </a>
<!--                        <img src="--><?//=SITE_TEMPLATE_PATH;?><!--/local/img/logo-bottom.png" alt="--><?//$APPLICATION->ShowTitle();?><!--">-->
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade prv_modal" id="callbackModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><img src=<?php echo SITE_TEMPLATE_PATH . "/local/img/close.png"; ?>></span>
                </button>
                <div class="modal_header">
                    <h3 class="modal-title" id="myModalLabel"><?=GetMessage('PRV_FOOTER_FEEDBACK_TITLE')?></h3>
                    <div class="modal_header_text"><?=GetMessage('PRV_FOOTER_FEEDBACK_SUBTITLE')?></div>
                </div>
				<div class="modal-body">
					<?$APPLICATION->IncludeComponent(
                        "prvolga.autoservice:universal.feedback", 
                        "feedback_modal_callback", 
                        array(
                            "EMAIL_TO" => "",
                            "EVENT_MESSAGE_ID" => array(
                                0 => "12",
                            ),
                            "IBLOCK_ID" => "23",
                            "IBLOCK_TYPE" => "prv_autoservice_feedback",
                            "LINK_TO_PERSONAL" => SITE_DIR . "agreement",
                            "PROPERTIES_CODE" => array(
                                0 => "NAME",
                                1 => "PHONE",
                            ),
                            "USE_PERSONAL" => "Y",
                            "COMPONENT_TEMPLATE" => "feedback_modal_callback"
                        ),
                        false
                    );?>
				</div>
			</div>
		</div>
	</div>
                
    <div class="modal fade prv_modal" id="resumeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><img src=<?php echo SITE_TEMPLATE_PATH . "/local/img/close.png"; ?>></span>
                </button>
                <div class="modal_header">
                    <h3 class="modal-title" id="myModalLabel"><?=GetMessage('PRV_FOOTER_RESUME_TITLE')?></h3>
                    <div class="modal_header_text"><?=GetMessage('PRV_FOOTER_RESUME_SUBTITLE')?></div>
                </div>
                <div class="modal-body">
                    <?$APPLICATION->IncludeComponent(
                        "prvolga.autoservice:universal.feedback", 
                        "feedback_modal_resume", 
                        array(
                            "EMAIL_TO" => "",
                            "EVENT_MESSAGE_ID" => array(
                                0 => "13",
                            ),
                            "IBLOCK_ID" => "20",
                            "IBLOCK_TYPE" => "prv_autoservice_feedback",
                            "LINK_TO_PERSONAL" => SITE_DIR . "agreement",
                            "PROPERTIES_CODE" => array(
                                0 => "NAME",
                                1 => "PHONE",
                                2 => "RESUME",
                            ),
                            "USE_PERSONAL" => "Y",
                            "COMPONENT_TEMPLATE" => "feedback_modal_resume"
                        ),
                        false
                    );?>
                </div>
            </div>
        </div>
    </div>
        
    <div class="modal fade prv_modal" id="supplierModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><img src=<?php echo SITE_TEMPLATE_PATH . "/local/img/close.png"; ?>></span>
                </button>
                <div class="modal_header">
                    <h3 class="modal-title" id="myModalLabel"><?=GetMessage('PRV_FOOTER_SUPPLIER_TITLE')?></h3>
                    <div class="modal_header_text"><?=GetMessage('PRV_FOOTER_SUPPLIER_SUBTITLE')?></div>
                </div>
                <div class="modal-body">
                    <?$APPLICATION->IncludeComponent(
                        "prvolga.autoservice:universal.feedback", 
                        "feedback_modal_supplier", 
                        array(
                            "EMAIL_TO" => "",
                            "EVENT_MESSAGE_ID" => array(
                                0 => "12",
                            ),
                            "IBLOCK_ID" => "21",
                            "IBLOCK_TYPE" => "prv_autoservice_feedback",
                            "LINK_TO_PERSONAL" => SITE_DIR . "agreement",
                            "PROPERTIES_CODE" => array(
                                0 => "NAME",
                                1 => "PHONE",
                                2 => "EMAIL",
                            ),
                            "USE_PERSONAL" => "Y",
                            "COMPONENT_TEMPLATE" => "feedback_modal_supplier"
                        ),
                        false
                    );?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade prv_modal" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><img src=<?php echo SITE_TEMPLATE_PATH . "/local/img/close.png"; ?>></span>
                </button>
                <div class="modal_header">
                    <h3 class="modal-title" id="myModalLabel"><?=GetMessage('PRV_FOOTER_ORDER_TITLE')?> <span id="order_title"></span></h3>
                    <div class="modal_header_text"><?=GetMessage('PRV_FOOTER_FEEDBACK_SUBTITLE')?></div>
                </div>
				<div class="modal-body">
					<?$APPLICATION->IncludeComponent(
	"prvolga.autoservice:universal.feedback", 
	"feedback_modal_order", 
	array(
		"EMAIL_TO" => "",
		"EVENT_MESSAGE_ID" => array(
			0 => "12",
		),
		"IBLOCK_ID" => "24",
		"IBLOCK_TYPE" => "prv_autoservice_feedback",
		"LINK_TO_PERSONAL" => SITE_DIR."inc/agreement_text.php",
		"PROPERTIES_CODE" => array(
			0 => "NAME",
			1 => "SERVICE",
			2 => "PHONE",
		),
		"USE_PERSONAL" => "Y",
		"COMPONENT_TEMPLATE" => "feedback_modal_order",
		"USE_RECAPTCHA" => "N"
	),
	false
);?>
				</div>
			</div>
		</div>
	</div>

    <div class="modal fade bd-example-modal-lg" id="thanks" tabindex="-1" role="dialog" aria-labelledby="thanks">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-body thanks-modal-body">
				<?=GetMessage("PRV_FEEDBACK_OK_MESSAGE_TEXT")?>
	      </div>
	    </div>
	  </div>
	</div>
    <!-- RedConnect -->
    <script id="rhlpscrtg" type="text/javascript" charset="utf-8" async="async"
            src="https://web.redhelper.ru/service/main.js?c=johndajohn"></script>
    <div style="display: none"><a class="rc-copyright"
                                  href="http://redconnect.ru">Сервис звонка с сайта RedConnect</a></div>
    <!--/RedConnect →
</body>
</html>
<?
function ShowSectionBG()
{
    global $APPLICATION;
    $image = $APPLICATION->GetDirProperty("section_background");
    if(!empty($image))
        return 'style="background-image:url(\'' . str_replace("//", "/", SITE_DIR . '/section_background_img/' . $image) . '\');"';
    else 
        return '';
}
function ShowLeftMenuHeader()
{
    global $APPLICATION;
    $result = '';
    if ($APPLICATION->GetDirProperty("leftmenu") == 'Y')
    {
        ob_start();
        ?>
            <div class="row">
                <div class="col-lg-3 d-none d-lg-block left_bar">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => "/inc/left_menu.php",
                        "EDIT_TEMPLATE" => ""
                        ),
                        false
                    );?>
                </div>
                <div class="col-12 col-lg-9">
        <?
        $result = ob_get_contents();
        ob_clean();
        ob_end_clean();
    }
    return $result;
}
function ShowLeftMenuFooter()
{
    global $APPLICATION;
    $result = '';
    if ($APPLICATION->GetDirProperty("leftmenu") == 'Y')
    {
        $result = '</div></div>';
    }
    return $result;
}
?>