<div class="modal fade" id="rightsModal" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog-centered modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">User Menu</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <div class="text-center">
                        <span id="selectedUserClass" style="font-weight: bold;"></span> - <span
                            id="selectedUserDescription" style="font-weight: bold;"></span>
                    </div>
                    <table class="table table-hover table-bordered" id="privilegetable">
                        <thead>
                            <tr>
                                <th>Program Description</th>
                                <th class="text-center">Access</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="background-color: #DCDCDC;">Near Expiry Stock Advise</td>
                                <td style="background-color: #DCDCDC;" class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="nesa">
                                        <label class="form-check-label1" name for="nesa"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Near Expiry Advise Form</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="nesaForm">
                                        <label class="form-check-label1" name for="nesaForm"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="email">
                                        <label class="form-check-label1" name for="email"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: #DCDCDC;">Stock Withdrawal Advise</td>
                                <td style="background-color: #DCDCDC;" class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="swa">
                                        <label class="form-check-label1" name for="swa"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Stock Withdrawal Advise Form</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="swaForm">
                                        <label class="form-check-label1" name for="swaForm"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Stock Withdrawal Advise - View Only</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="swaVo">
                                        <label class="form-check-label1" name for="swaVo"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>SWA Confirmation - MIS</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="swaMis">
                                        <label class="form-check-label1" name for="swaMis"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Promo Execution Report</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="per">
                                        <label class="form-check-label1" name for="per"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Promo Execution Report - View Only</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="perVo">
                                        <label class="form-check-label1" name for="perVo"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>SWA Confirmation - Accounting</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="swaAcctg">
                                        <label class="form-check-label1" name for="swaAcctg"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>SWA Reports</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="swaReports">
                                        <label class="form-check-label1" name for="swaReports"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: #DCDCDC;">System Manager</td>
                                <td class="text-center" style="background-color: #DCDCDC;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="systemManager">
                                        <label class="form-check-label1" name for="systemManager"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Subsidiary</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="subsidiary">
                                        <label class="form-check-label1" name for="subsidiary"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Supplier</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="supplier">
                                        <label class="form-check-label1" name for="supplier"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>User Filtering</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="userFiltering">
                                        <label class="form-check-label1" name for="userFiltering"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>User Type</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="userType">
                                        <label class="form-check-label1" name for="userType"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>System User</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="systemUser">
                                        <label class="form-check-label1" name for="systemUser"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>User Menu</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="userMenu">
                                        <label class="form-check-label1" name for="userMenu"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: #DCDCDC;">System Utilities</td>
                                <td class="text-center" style="background-color: #DCDCDC;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="systemUtilities">
                                        <label class="form-check-label1" name for="systemUtilities"></label>
                                    </div>
                                </td>
                            </tr>
                            <!-- <tr>
                                <td>System Wallpaper</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="systemWallpaper">
                                        <label class="form-check-label1" name for="systemWallpaper"></label>
                                    </div>
                                </td>
                            </tr> -->
                            <tr>
                                <td>About the System</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="aboutSystem">
                                        <label class="form-check-label1" name for="aboutSystem"></label>
                                    </div>
                                </td>
                            </tr>
                            <!-- <tr>
                                <td>File Import</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="generateReport">
                                        <label class="form-check-label1" name for="generateReport"></label>
                                    </div>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary waves-effect waves-light custom-btn-db"
                    id="save-changes-button">Save
                    changes</button>
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>