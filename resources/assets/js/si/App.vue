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
                            <i class="icon-display4 position-left"></i> Escritorio
                        </router-link>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-cogs position-left"></i> Maestros del Sistema <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu width-250">
                            <li>
                                <router-link :to="{ name: 'personas' }">
                                    <i class="icon-people"></i> Maestro de Personas
                                </router-link>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#"><i class="icon-gear"></i> Configuración</a>
                                <ul class="dropdown-menu width-200">
                                    <li><router-link :to="{ name: 'aplicaciones' }">Aplicaciones</router-link></li>
                                    <li><router-link :to="{ name: 'parametros' }">Parametros</router-link></li>
                                    <li><router-link :to="{ name: 'miscelaneos' }">Miscelaneos</router-link></li>
                                    <li><router-link :to="{ name: 'estructura-monetaria' }">Estructura Monetaria</router-link></li>
                                    <li><router-link :to="{ name: 'cambio-diario' }">Tipo de Cambio Diario</router-link></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#"><i class="icon-office"></i> Organizacion</a>
                                <ul class="dropdown-menu width-200">
                                    <li><router-link :to="{ name: 'empresas' }">Companias / Empresas</router-link></li>
                                    <li><router-link :to="{ name: 'unidades' }">Unidades de Negocio</router-link></li>
                                    <li><router-link :to="{ name: 'sucursales' }">Sucursales</router-link></li>
                                    <li><router-link :to="{ name: 'estructura' }">Estructura Organizacional</router-link></li>
                                    <li><router-link :to="{ name: 'grupo-ccosto' }">Grupo de Centro de Costos</router-link></li>
                                    <li><router-link :to="{ name: 'ccosto' }">Centro de Costos</router-link></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#"><i class="icon-map4"></i> Organizacion Territorial</a>
                                <ul class="dropdown-menu width-200">
                                    <li><router-link :to="{ name: 'paises' }">Paises</router-link></li>
                                    <li><router-link :to="{ name: 'estados' }">Provincias / Estados</router-link></li>
                                    <li><router-link :to="{ name: 'municipios' }">Departamentos / Municipios</router-link></li>
                                    <li><router-link :to="{ name: 'ciudades' }">Ciudades</router-link></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-lock position-left"></i> Administracion de la Seguridad <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu width-250">
                            <li class="dropdown-submenu">
                                <a href="#"><i class="icon-user"></i> Seguridad</a>
                                <ul class="dropdown-menu width-200">
                                    <li><router-link :to="{ name: 'usuarios' }">Maestro de Usuarios</router-link></li>
                                    <li><router-link :to="{ name: 'conceptos' }">Conceptos de Seguridad</router-link></li>
                                    <li><router-link :to="{ name: 'autorizaciones' }">Asignar Autorizaciones</router-link></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#"><i class="icon-users2"></i> Seguridad Alterna</a>
                                <ul class="dropdown-menu width-200">
                                    <li><router-link :to="{ name: 'conceptos-alterna' }">Conceptos de Seguridad</router-link></li>
                                    <li><router-link :to="{ name: 'autorizaciones-alterna' }">Asignar Autorizaciones</router-link></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /second navbar -->

        <router-view></router-view>
    </div>
</template>
