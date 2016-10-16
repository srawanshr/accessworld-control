<div class="order">
    <div class="card">
        <div class="card-head">
            <header>@{{ item.name }}: @{{ item.type | capitalize }}</header>
            <div class="tools">
                <div class="btn-group">
                    <a class="btn btn-icon-toggle btn-collapse">
                        <i class="md md-arrow-drop-down"></i>
                    </a>
                    <a class="btn btn-icon-toggle btn-close btn-danger" @click="selfDestruct(item)">
                        <i class="md md-close"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div v-if=" item.type == 'vps' ">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" :name=" 'vps[' + item.id + '][name]' " class="form-control" v-model="item.name" required>
                            <input type="hidden" :name=" 'vps[' + item.id + '][type]' " v-model="item.type">
                            <label>Name</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" :name=" 'vps[' + item.id +'][term]' " class="form-control" min="1" v-model="item.term" required>
                            <label>Term (in months)</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <span class="text-default-light text-light">Is Trial</span>
                        <div class="checkbox checkbox-styled">
                            <label>
                                <input type="checkbox" value="1" :name=" 'vps[' + item.id + '][is_trial]' " v-model="item.is_trial">
                                <span>Trial</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <span class="text-default-light text-light">Is Managed</span>
                        <div class="checkbox checkbox-styled">
                            <label>
                                <input type="checkbox" value="1" :name=" 'vps[' + item.id + '][is_managed]' " v-model="item.is_managed">
                                <span>Managed</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <select :name=" 'vps[' + item.id + '][operating_system_id]' " class='form-control' v-model="item.operating_system_id" required>
                                <option selected value>Select an item</option>
                                @foreach(operating_systems() as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            <label>Operating System</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <select :name=" 'vps[' + item.id + '][data_center_id]' " class='form-control' v-model="item.data_center_id" required>
                                <option selected value>Select an item</option>
                                @foreach(data_centers() as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            <label>Data Center</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <select :name=" 'vps[' + item.id + '][currency]' " class="form-control" v-model="item.currency" :disabled="item.is_trial" :required="!item.is_trial">
                                <option value="" selected>Select a Currency</option>
                                <option value="NPR">NPR</option>
                                <option value="USD">USD</option>
                            </select>
                            <label>Currency</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" :name=" 'vps[' + item.id + '][price]' " class="form-control" min="0" step="any" v-model="item.price" :disabled="item.is_trial" :required="!item.is_trial">
                            <label>Price</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" :name=" 'vps[' + item.id + '][discount]' " class="form-control" min="0" step="any" v-model="item.discount" :disabled="item.is_trial">
                            <label>Discount</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" :name=" 'vps[' + item.id + '][additional_ip]' " class="form-control" v-model="item.additional_ip">
                            <label>Additional IP</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-content">
                                    <input type="number" :name=" 'vps[' + item.id + '][cpu]' " class="form-control" min="1" step="1" v-model="item.cpu" required>
                                    <label>CPU</label>
                                </div>
                                <span class="input-group-addon">CORE</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-content">
                                    <input type="number" :name=" 'vps[' + item.id + '][ram]' " class="form-control" min="1" step="1" v-model="item.ram" required>
                                    <label>RAM</label>
                                </div>
                                <span class="input-group-addon">GB</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-content">
                                    <input type="number" :name=" 'vps[' + item.id + '][disk]' " class="form-control" min="1" step="1" v-model="item.disk" required>
                                    <label>DISK/STORAGE</label>
                                </div>
                                <span class="input-group-addon">GB</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-content">
                                    <input type="number" :name=" 'vps[' + item.id + '][traffic]' " class="form-control" min="1" step="1" v-model="item.traffic" required>
                                    <label>TRAFFIC/BANDWIDTH</label>
                                </div>
                                <span class="input-group-addon">GB</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if=" item.type == 'web' ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" :name=" 'web[' + item.id + '][name]' " class="form-control" v-model="item.name" required>
                            <input type="hidden" :name=" 'web[' + item.id + '][type]' " v-model="item.type">
                            <label>Name</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" :name=" 'web[' + item.id + '][term]' " class="form-control" min="1" required v-model="item.term" required>
                            <label>Term (in months)</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select :name=" 'web[' + item.id + '][currency]' " class="form-control" v-model="item.currency" :disabled="item.is_trial" :required="!item.is_trial">
                                <option value="" selected>Select a Currency</option>
                                <option value="NPR">NPR</option>
                                <option value="USD">USD</option>
                            </select>
                            <label>Currency</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" :name=" 'web[' + item.id + '][price]' " min="0" step="any" class="form-control" required v-model="item.price" required>
                            <label>Price</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" :name=" 'web[' + item.id + '][discount]' " min="0" step="any" class="form-control" v-model="item.discount">
                            <label>Discount</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-content">
                                    <input type="number" :name=" 'web[' + item.id + '][domain]' " class="form-control" min="1" step="1" v-model="item.domain" required>
                                    <label>DOMAIN</label>
                                </div>
                                <span class="input-group-addon">#</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-content">
                                    <input type="number" :name=" 'web[' + item.id + '][disk]' " class="form-control" min="1" step="1" v-model="item.disk" required>
                                    <label>DISK/STORAGE</label>
                                </div>
                                <span class="input-group-addon">GB</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-content">
                                    <input type="number" :name=" 'web[' + item.id + '][traffic]' " class="form-control" min="1" step="1" v-model="item.traffic" required>
                                    <label>TRAFFIC/BANDWIDTH</label>
                                </div>
                                <span class="input-group-addon">GB</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if=" item.type == 'email' ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" :name=" 'email[' + item.id + '][name]' " class="form-control" v-model="item.name" required>
                            <input type="hidden" :name=" 'email[' + item.id + '][type]' " v-model="item.type">
                            <label>Name</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" :name=" 'email[' + item.id + '][term]' " class="form-control" min="1" v-model="item.term" required>
                            <label>Term (in months)</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select :name=" 'email[' + item.id + '][currency]' " class="form-control" v-model="item.currency" :disabled="item.is_trial" :required="!item.is_trial">
                                <option value="" selected>Select a Currency</option>
                                <option value="NPR">NPR</option>
                                <option value="USD">USD</option>
                            </select>
                            <label>Currency</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" :name=" 'email[' + item.id + '][price]' " class="form-control" min="0" step="any" v-model="item.price" required>
                            <label>Price</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" :name=" 'email[' + item.id + '][discount]' " class="form-control" min="0" step="any" v-model="item.discount">
                            <label>Discount</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-content">
                                    <input type="number" :name=" 'email[' + item.id + '][domain]' " class="form-control" min="1" step="1" v-model="item.domain" required>
                                    <label>DOMAIN</label>
                                </div>
                                <span class="input-group-addon">#</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-content">
                                    <input type="number" :name=" 'email[' + item.id + '][disk]' " class="form-control" min="1" step="1" v-model="item.disk" required>
                                    <label>DISK/STORAGE</label>
                                </div>
                                <span class="input-group-addon">GB</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-content">
                                    <input type="number" :name=" 'email[' + item.id + '][traffic]' " class="form-control" min="1" step="1" v-model="item.traffic" required>
                                    <label>TRAFFIC/BANDWIDTH</label>
                                </div>
                                <span class="input-group-addon">GB</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if=" item.type == 'endpoint-security' ">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="number" :name=" 'endpoint-security[' + item.id + '][user_count]' " class="form-control" v-model="item.user_count" min="1" required>
                            <input type="hidden" :name=" 'endpoint-security[' + item.id + '][type]' " v-model="item.type">
                            <label>User Count</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="number" :name=" 'endpoint-security[' + item.id +'][term]' " class="form-control" min="1" v-model="item.term" required>
                            <label>Term (in months)</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select :name=" 'endpoint-security[' + item.id + '][currency]' " class="form-control" v-model="item.currency" required>
                                <option value="" selected>Select a Currency</option>
                                <option value="NPR">NPR</option>
                                <option value="USD">USD</option>
                            </select>
                            <label>Currency</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" :name=" 'endpoint-security[' + item.id + '][price]' " class="form-control" min="0" step="any" v-model="item.price" required>
                            <label>Price</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" :name=" 'endpoint-security[' + item.id + '][discount]' " class="form-control" value="0" min="0" step="any" v-model="item.discount">
                            <label>Discount</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
