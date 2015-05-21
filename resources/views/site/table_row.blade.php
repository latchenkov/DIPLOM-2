<tr ng-repeat="ad_show in adsstore"  ng-class=" ad_show.type == 'corporate' ? 'bg-warning' : '' ">
    <td ng-bind="ad_show.created_at*1000 | date:'dd-MM-yyyy HH:mm:ss'"></td>
    <td ng-bind="ad_show.title"></td>
    <td><a class="btn btn-info btn-xs " ng-click="showAd(adForm, $index, adsstore)" title="Показать объявление" ><strong>?</strong></a></td>
    <td ng-bind="ad_show.price | number:2"></td>
    <td ng-bind="ad_show.seller_name"></td>
    <td align="center"><a class="btn btn-danger btn-xs" ng-click="removeAd($index, adForm)" title="Удалить объявление" ><strong>X</strong></a></td>
</tr>

