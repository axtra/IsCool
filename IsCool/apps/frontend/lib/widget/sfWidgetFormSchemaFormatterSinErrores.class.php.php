<?php
    
/**
 * Description of formateadorVacio
 *
 * @author juan
 */
class sfWidgetFormSchemaFormatterSinErrores extends sfWidgetFormSchemaFormatter {
  protected
    $rowFormat                 = "<tr><th>%label%</th><td>%field%%help%%hidden_fields%</td></tr>",
    $helpFormat                = '<br />%help%',
    $errorRowFormat            = "",
    $errorListFormatInARow     = "  <ul class=\"error_list\">%errors%  </ul>",
    $errorRowFormatInARow      = "    <li><span>%error%</span></li>",
    $namedErrorRowFormatInARow = "    <li>%name%: %error%</li>",
    $decoratorFormat           = "<table>%content%</table>";
}

?>
