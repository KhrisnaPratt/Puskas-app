<?php

namespace App\Contracts;

interface CashTransactionInterface
{
    public function cashTransactionLatest(array $columns, ?int $limit): Object;
    public function sumAmountBy(string $status, string $year = null, string $month = null): Int;
    public function countStudentWhoPaidOrNotPaidThisWeek(bool $status): Int;
    public function getStudentWhoNotPaidThisWeek(?int $limit, string $order): Object;
    public function results(): array;
}
