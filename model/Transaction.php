<?php

interface Transaction {

function deposit($value);

function withdraw($value);

function transfer($value, $balanceTo);
}