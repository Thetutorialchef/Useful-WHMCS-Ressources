<?php
##### Copyright by Deadlyviruz #####
if (!defined("WHMCS"))
   die("This file cannot be accessed directly");

function prevent_invoices($vars) {

 // WHMCS admin user for API
 $adminuser = 'WHMCSADMINUSER';

 // Get invoice ID
 $invoiceid = $vars['invoiceid'];

 ##### Start API Update #####
 $command = "updateinvoice";
 $values["invoiceid"] = $invoiceid;

 $values["notes"] = "Invoice is issued by another system.";
 $values["status"] = "Cancelled";

 $results = localAPI($command,$values,$adminuser);
 ##### End Admin Password API Call #####

}

add_hook("InvoiceCreated",1,"prevent_invoices");
//add_hook("InvoiceCreationPreEmail",1,"prevent_invoices");
##### Copyright by Deadlyviruz #####
?>