<?php

function subscriptionsToPriceTable($subscriptions) {
    $columns = "";

    foreach ($subscriptions as $index => $subscription) {
        $name = $subscription['name'];
        $price = number_format($subscription['price'], 2, ',', '.');
        $devices = $subscription["devices"];
        $resolution = $subscription["resolution"];

        $price = str_replace(".", ",", $price);

        if ($devices == 1) {
            $devices .= " scherm";
        } else {
            $devices .= " schermen";
        }

        $index += 1;

        $columns .= "
<div class='col column$index'>
    <div>$name</div>
    <div>€ $price</div>
    <div>$devices</div>
    <div>$resolution</div>
</div>
        ";
    }

    return "<div class='price-table'>$columns</div>";
}

function subscriptionsToSelect($subscriptions, $selected) {
    $options = "";

    foreach ($subscriptions as $subscription) {
        $name = $subscription["name"];

        $selectedAttr = "";

        if ($name == $selected) {
            $selectedAttr = "selected";
        }

        $options .= "<option value='$name' $selectedAttr>$name</option>";
    }

    return "
<div class='select-field'>
    <select id='subscription' name='subscription'>
        $options
    </select>
</div>
    ";
}
