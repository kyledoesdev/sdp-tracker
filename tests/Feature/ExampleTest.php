<?php

it('home page loads', function () {
    $this->get('/')->assertStatus(302); /* redirects home */
    $this->get('/home')->assertStatus(302); /* redirects to ?season=3 */
    $this->get('/home?season=3')->assertOk(); /* Home */
});
