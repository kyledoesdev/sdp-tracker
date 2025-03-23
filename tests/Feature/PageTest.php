<?php

it('loads the home page', function () {
    $this->get(route('root'))->assertStatus(302); /* redirects home */
    $this->get(route('home'))->assertStatus(302); /* redirects to ?season=3 */
    $this->get(route('home') . '?season=4')->assertOk(); /* Home */
});

it('loads the stats page', function() {
    $this->get(route('stats'))->assertOk();
});