
<form name="adForm" class="form-horizontal form-group-sm" novalidate>
    <input type="hidden"  name="id" value="" ng-model="ad.id">
	
        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-7">
                <div class="radio">
                    <label>
                        <input type="radio" name="type" value="private" ng-model="ad.type" />Частное лицо</label></br>
                    <label>
                        <input type="radio" name="type" value="corporate" ng-model="ad.type" />Компания</label></br>
                </div>
            </div>
        </div>            
        <div class="form-group with-help-block " ng-class=" !error.seller_name ? '' : 'has-error' ">
            <label for="inputSeller_name" class="col-sm-5 control-label">Ваше имя</label>
                <div class="col-sm-7">
                    <input type="text" name="seller_name" ng-model="ad.seller_name" class="form-control" id="inputSeller_name" placeholder="Ваше имя" maxlength="40" required aria-describedby="seller_nameHelpBlock">
                        <span id="seller_nameHelpBlock" class="help-block"><h6  ng-repeat="err in error.seller_name" ng-bind="err"></h6></span>           
                </div>
        </div>
        <div class="form-group with-help-block" ng-class=" !error.email ? '' : 'has-error' ">
            <label for="inputEmail" class="col-sm-5 control-label">Электронная почта</label>
                <div class="col-sm-7">
                    <input type="text" name="email" ng-model="ad.email" class="form-control" id="inputEmail" placeholder="Ваш e-mail"   required maxlength="40" aria-describedby="emailHelpBlock">
                        <span id="emailHelpBlock" class="help-block"><h6  ng-repeat="err in error.email" ng-bind="err"></h6></span>
                </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-7">
                <div class="checkbox">
                    <label>
                        <input  type="checkbox"  ng-model="ad.allow_mails" name="allow_mails" ><small>&nbsp;&nbsp;Я не хочу получать вопросы по объявлению по e-mail</small>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group with-help-block" ng-class=" !error.phone ? '' : 'has-error' ">
            <label for="inputPhone" class="col-sm-5 control-label">Номер телефона</label>
                <div class="col-sm-7">
                    <input type="text" name="phone" ng-model="ad.phone" class="form-control" id="inputPhone" placeholder="Ваш телефон"   required maxlength="20" aria-describedby="phoneHelpBlock">
                        <span id="phoneHelpBlock" class="help-block"><h6  ng-repeat="err in error.phone" ng-bind="err"></h6></span>
                </div>
        </div>
        <div class="form-group with-help-block" ng-class=" !error.location_id ? '' : 'has-error' ">
            <label for="inputLocation" class="col-sm-5 control-label">Город</label>
                <div class="col-sm-7">
                   <select class="form-control" title="Выберите Ваш город" name="location_id" ng-model="ad.location_id" required  aria-describedby="location_idHelpBlock"> 
                        <option value="">-- Выберите город --</option>
                        <option ng-repeat="location in location_list" >@{{location.location}}</option>
                    </select>
                        <span id="location_idHelpBlock" class="help-block"><h6  ng-repeat="err in error.location_id" ng-bind="err"></h6></span>
                </div>
        </div>
        <div class="form-group with-help-block" ng-class=" !error.category_id ? '' : 'has-error' ">
            <label for="inputCategory" class="col-sm-5 control-label">Категория</label>
                <div class="col-sm-7">
                   <select class="form-control" title="Выберите категорию объявления" name="category_id" ng-model="ad.category_id" required aria-describedby="category_idHelpBlock">
                        <option value="">-- Выберите категорию --</option>
                            <optgroup ng-repeat="label in category_list | filter:{parent_id:null}" label="@{{label.category}}">
                                <option ng-repeat="category in category_list | filter:{parent_id:label.id}" >@{{category.category}}</option>
                            </optgroup>
                    </select>
                        <span id="category_idHelpBlock" class="help-block"><h6  ng-repeat="err in error.category_id" ng-bind="err"></h6></span>
                </div>
        </div>
        <div class="form-group with-help-block" ng-class=" !error.title ? '' : 'has-error' ">
            <label for="inputTitle" class="col-sm-5 control-label">Название объявления</label>
                <div class="col-sm-7">
                    <input type="text" name="title" ng-model="ad.title" class="form-control" id="inputTitle" placeholder="Название объявления"   required maxlength="40" aria-describedby="titleHelpBlock">
                        <span id="titleHelpBlock" class="help-block"><h6  ng-repeat="err in error.title" ng-bind="err"></h6></span>
                </div>
        </div>
        <div class="form-group with-help-block" ng-class=" !error.description ? '' : 'has-error' ">
            <label for="inputDesc" class="col-sm-5 control-label">Описание объявления</label>
                <div class="col-sm-7">
                    <textarea name="description" ng-model="ad.description" class="form-control" rows="5" id="inputDesc" placeholder="Текст объявления" required maxlength="255" aria-describedby="descriptionHelpBlock"></textarea>
                        <span id="descriptionHelpBlock" class="help-block"><h6  ng-repeat="err in error.description" ng-bind="err"></h6></span>
                </div>
        </div>
        <div class="form-group with-help-block " ng-class=" !error.price ? '' : 'has-error' ">
            <label for="inputPrice" class="col-sm-5 control-label">Цена</label>
                <div class="col-sm-7">
                    <div class="input-group">
                        <input type="text" name="price" ng-model="ad.price"  class="form-control" id="inputPrice" placeholder="Ведите цену" required aria-describedby="priceHelpBlock">
                        <div class="input-group-addon">руб.</div>
                    </div>   
                        <span id="priceHelpBlock" class="help-block"><h6  ng-repeat="err in error.price" ng-bind="err"></h6></span>
                </div>
        </div>
                        
        <div class="form-group">
            <div class="col-sm-5">
                <button id="submit" type="submit" ng-click="save(ad, adForm)"  class="btn btn-success" style="width: 180px"><strong ng-bind="buttontext"></strong></button>
            </div>
            <div class="col-sm-offset-2 col-sm-5">
                <button id="resetForm" type="button" ng-click="resetForm(adForm)" class="btn btn-warning" style="width: 150px"><strong>Очистить форму</strong></button>
            </div>
        </div>
</form>

