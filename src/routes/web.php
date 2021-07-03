<?php


Route::middleware(['web'])->group(function () {
    Route::get('/apps/' . config('apps.template.slug'), function() {
        return view(config('apps.template.slug') . '::test');
    })->name("apps.template");
});