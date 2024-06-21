<?php
/*
barra di navigazione dei record
*/
function createPagination(
    int $totalRecords,
    int $recordsPerPage,
    int $currentPage,
    string $baseURL
){
$totalPages=(int)ceil($totalRecords/$recordsPerPage);//se mi esce 2,2 3,6 ecc va al num successivo
//ceil è l'opposto di floor che arrotonda per difetto 5.5=5 3.9=3


$html = '<nav aria-label="Page navigation">';
$html .=  '<ul class="pagination mt-2 justify-content-center">';
$disabled = $currentPage === 1 ? ' disabled' : '';
$previous = max(($currentPage - 1), 1);
$html .=  '<li class="page-item' . $disabled . '">
        <a  href="' . $baseURL . ' &page=' . $previous . '" class="page-link">Previous</a>
    </li>';
for ($i = 1; $i <= $totalPages; $i++) {
    $activeClass = $i == $currentPage ? ' active' : '';
    $disabled = $i == $currentPage ? ' disabled' : '';
    $html .=  '<li class="page-item"><a class="page-link' . $activeClass . $disabled . '" href="' . $baseURL . '&page=' . $i . '">' . $i . '</a></li>';
}


$disabled = $currentPage === $totalPages ? ' disabled' : '';

$next = min(($currentPage + 1), $totalPages);
$html .=
    '<li class="page-item' . $disabled . '">
        <a  href="' . $baseURL . ' &page=' . $next . '" class="page-link' . $disabled . '">Next </a>
    </li>';
$html .= '</ul>
</nav>';
return $html;
}
