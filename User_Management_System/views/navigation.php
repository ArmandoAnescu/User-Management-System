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
$numLinks=getConfig('numLinkNavigator',5);
$totalPages=(int)ceil($totalRecords/$recordsPerPage);//se mi esce 2,2 3,6 ecc va al num successivo
//ceil è l'opposto di floor che arrotonda per difetto 5.5=5 3.9=3


$html = '<nav class="navbar-dark bg-dark" aria-label="Page navigation">';
$html .=  '<ul class="pagination mt-2 justify-content-center">';
$disabled = $currentPage === 1 ? ' disabled' : '';
$previous = max(($currentPage - 1), 1);
$html .=  '<li class="page-item' . $disabled . '">
        <a  href="' . $baseURL . ' &page=' . $previous . '" class="page-link">Previous</a>
    </li>';

$extra= $currentPage+$numLinks-$totalPages ;
$extra=$extra>0?$extra:0;
$startValue=$currentPage-$numLinks-$extra;
$startValue=$startValue<1?1:$startValue; //se startValue è uguale di 1 lo setto a 1
//altrimenti val negativo
 //se extra è minore di 0 lo setto a 0

for ($i = $startValue; $i <= $currentPage; $i++) {
    $activeClass = $i == $currentPage ? ' active' : '';
    $disabled = $i == $currentPage ? ' disabled' : '';
    $html .=  '<li class="page-item"><a class="page-link' . $activeClass . $disabled . '" href="' . $baseURL . '&page=' . $i . '">' . $i . '</a></li>';
}

$extra=($currentPage-$numLinks)<0?abs($currentPage-$numLinks):0;
$startValue=$currentPage+1;
$startValue=$startValue<1?1:$startValue; //se startValue è uguale di 1 lo setto a 1
//altrimenti val negativo

$endValue=$currentPage+$numLinks+$extra;
$endValue=$endValue>$totalPages?$totalPages:$endValue;
$endValue=min($endValue,$totalPages);
for ($i = $startValue; $i <=$endValue; $i++) {
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
// $activeClass = $i == $currentPage ? ' active' : '';
// $disabled = $i == $currentPage ? ' disabled' : '';
// $html .=  '<li class="page-item"><a class="page-link' . $activeClass . $disabled . '" href="' . $baseURL . '&page=' . $currentPage . '">' . $currentPage . '</a></li>';
