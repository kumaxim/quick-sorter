<?php
/**
 * @author Kudryavtsev Maxim
 * @date 01.05.16
 */

namespace KuMaxim\Implementation;

interface BaseSorter
{
    public function sort(array $sequence, $direction);
}