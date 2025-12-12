<?php

it('loads the home page', function () {
    $this->get(route('home'))->assertOk(); /* Home */
});

it('loads the stats page', function() {
    $this->get(route('stats'))->assertOk();
});