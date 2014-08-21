<?php
    
/**
 * Description of formateadorVacio
 *
 * @author juan
 */
class sfWidgetFormSchemaFormatterVacio extends sfWidgetFormSchemaFormatter {
  protected
    $rowFormat                  = "%label% %field% %help%%hidden_fields%",
    $helpFormat                 = "%help%",
    $errorRowFormat             = "%errors%",
    $errorListFormatInARow      = "<ul class=\"error_list\">%errors%</ul>",
    $errorRowFormatInARow       = "<li><span>%error%</span></li>",
    $namedErrorRowFormatInARow  = "<li>%name%: %error%</li>",
    $decoratorFormat            = "%content%";
}

?>
