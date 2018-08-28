<template>
    <div>
        <!-- Second navbar -->
        <div class="navbar navbar-default" id="navbar-second">
            <ul class="nav navbar-nav no-border visible-xs-block">
                <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
            </ul>

            <div class="navbar-collapse collapse" id="navbar-second-toggle">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <router-link :to="{ name: 'dashboard' }">
                            <i class="icon-display4 position-left"></i> &nbsp;&nbsp;
                        </router-link>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-stack3 position-left"></i> Gestion Contable <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu width-250">
                            <li>
                                <router-link :to="{ name: 'asiento-nuevo' }">
                                    <i class="icon-popout"></i> Nuevo Asiento
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{ name: 'asiento-listar' }">
                                    <i class="icon-file-spreadsheet2"></i> Listar Asientos
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{ name: 'asiento-modificar' }">
                                    <i class="icon-pencil7"></i> Modificar Asientos
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{ name: 'asiento-aprobar' }">
                                    <i class="icon-popout" style="color:green;"></i> Aprobar Asientos
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{ name: 'asiento-anular' }">
                                    <i class="icon-popout" style="color:red;"></i> Anular Asientos
                                </router-link>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-make-group position-left"></i> Procesos <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu width-250">
                            <li class="dropdown-submenu">
                                <a href="#"><i class=" icon-flip-vertical3"></i> Actualizacion de Balances</a>
                                <ul class="dropdown-menu width-200">
                                    <li><router-link :to="{ name: 'mayorizar' }">Mayorizar Asientos</router-link></li>
                                    <li><router-link :to="{ name: 'desmayorizar' }">Desmayorizar Asientos</router-link></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#"><i class=" icon-stats-bars3"></i> Analisis de Cuentas</a>
                                <ul class="dropdown-menu width-200">
                                    <li><router-link :to="{ name: 'saldo-cuenta' }">Saldos x Cuentas</router-link></li>
                                    <li><router-link :to="{ name: 'saldo-ccosto' }">Saldos x Centro de Costos</router-link></li>
                                    <li><router-link :to="{ name: 'estado-fnanciero' }">Estados Financieros</router-link></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#"><i class=" icon-calendar2"></i> Cierres Contables</a>
                                <ul class="dropdown-menu width-200">
                                    <li><router-link :to="{ name: 'cierre-mensual' }">Cierre Mensual</router-link></li>
                                    <li><router-link :to="{ name: 'cierre-anual' }">Cierre Anual</router-link></li>
                                    <li><router-link :to="{ name: 'cierre-confirmar' }">Confirmacion de Cierre</router-link></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#"><i class="icon-import"></i> Importar Asientos</a>
                                <ul class="dropdown-menu width-200">
                                    <li><router-link :to="{ name: 'importar-externo' }">Importar de Sistemas Externos</router-link></li>
                                    <li><router-link :to="{ name: 'importar-sistema' }">Importar del Sistema</router-link></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-printer4 position-left"></i> Reportes <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu width-250">
                            <li>
                                <router-link :to="{ name: 'libro-diario' }">
                                    <i class="icon-book3"></i> Libro Diario
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{ name: 'libro-mayor' }">
                                    <i class="icon-book3"></i> Libro Mayor Analitico
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{ name: 'balance-comprobacion' }">
                                    <i class="icon-book3"></i> Balance de Comprobacion
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{ name: 'balance-general' }">
                                    <i class="icon-book3"></i> Balance General
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{ name: 'estado-resultado' }">
                                    <i class="icon-book3"></i> Estados de Resultados
                                </router-link>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-cogs position-left"></i> Maestros <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu width-250">
                            <li>
                                <router-link :to="{ name: 'personas' }">
                                    <i class="icon-people"></i> Maestro de Personas
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{ name: 'cambio-diario' }">
                                    <i class=" icon-percent"></i> Tipo de Cambio Diario
                                </router-link>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#"><i class="icon-gear"></i> Relacionados a Contabilidad</a>
                                <ul class="dropdown-menu width-200">
                                    <li><router-link :to="{ name: 'contabilidades' }">Contabilidades</router-link></li>
                                    <li><router-link :to="{ name: 'libro-contable' }">Libros Contables</router-link></li>
                                    <li><router-link :to="{ name: 'plan-cuenta' }">Plan de Cuentas Contables</router-link></li>
                                    <li><router-link :to="{ name: 'tipo-asiento' }">Tipos de Asiento Contable</router-link></li>
                                    <li><router-link :to="{ name: 'modelo-asiento' }">Modelo de Asientos Contables</router-link></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#"><i class="icon-office"></i> Otros Maestros</a>
                                <ul class="dropdown-menu width-200">
                                    <li><router-link :to="{ name: 'empresas' }">Control de Periodos Contables</router-link></li>
                                    <li><router-link :to="{ name: 'unidades' }">Tipo de Cambio de Cierre y Factor de Ajuste Inflacion</router-link></li>
                                    <li><router-link :to="{ name: 'sucursales' }">Grupo de Flujo de Caja</router-link></li>
                                    <li><router-link :to="{ name: 'estructura' }">Sub-Grupo de Flujo de Caja</router-link></li>
                                    <li><router-link :to="{ name: 'grupo-ccosto' }">Flujo de Caja</router-link></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="changelog.html">
                            <i class="icon-history position-left"></i>
                            Changelog
                            <span class="label label-inline position-right bg-success-400">1.6</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-cog3"></i>
                            <span class="visible-xs-inline-block position-right">Share</span>
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                            <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                            <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /second navbar -->

        <router-view></router-view>
    </div>
</template>
