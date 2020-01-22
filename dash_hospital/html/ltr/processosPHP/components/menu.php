<?php 
    
    $location = $_GET['location'];
    
    if($location == 1){
?>
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php?location=1" aria-expanded="false">
                                <i class="fas fa-tachometer-alt"></i>
                                <span class="hide-menu">Painel de Controle</span>
                            </a>
                            
                        </li>
                        
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="plantao.php?location=1" aria-expanded="false">
                                <i class="fas fa-calendar-check"></i>
                                <span class="hide-menu">Plantão</span>
                            </a>
                        </li>

                        <li class="sidebar-item tes-a">
                            <a href="#funcionarioSubMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle waves-effect waves-dark sidebar-link">
                                <i class="fas fa-user-circle"></i>
                                <span class="hide-menu">Funcionários</span>
                            </a>
                            <ul class="collapse" id="funcionarioSubMenu">
                                <li class="li-sub-c">
                                    <a href="funcionarios.php?location=1">
                                        <i class="fas fa-angle-double-right"></i>
                                        Lista de Funcionários
                                    </a>
                                </li>
                                <li class="li-sub-c">
                                    <a href="funcionarios_inativo.php?location=1">
                                        <i class="fas fa-angle-double-right"></i>
                                        Funcionários inativos
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a href="#medicoSubMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle waves-effect waves-dark sidebar-link">
                                <i class="fas fa-user-md"></i>
                                <span class="hide-menu">Médicos</span>
                            </a>
                            <ul class="collapse" id="medicoSubMenu">
                                <li class="li-sub-c">
                                    <a href="medicos.php?location=1">
                                        <i class="fas fa-angle-double-right"></i>
                                        Lista de Médicos
                                    </a>
                                </li>
                                <li class="li-sub-c">
                                    <a  href="medicos_inativo.php?location=1">
                                        <i class="fas fa-angle-double-right"></i>
                                        Médicos inativos
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a href="#especialidadeSubMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle waves-effect waves-dark sidebar-link">
                                <i class="fas fa-atom"></i>
                                <span class="hide-menu">Especialidade</span>
                            </a>
                            <ul class="collapse" id="especialidadeSubMenu">
                                <li class="li-sub-c">
                                    <a href="especialidade.php?location=1">
                                        <i class="fas fa-angle-double-right"></i>
                                        Lista de Especialidades
                                    </a>
                                </li>
                                <li class="li-sub-c">
                                    <a href="especialidade_inativo.php?location=1">
                                        <i class="fas fa-angle-double-right"></i>
                                        Especialidades inativas
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="relatorios.php?location=1" aria-expanded="false">
                                <i class="fas fa-notes-medical"></i> 
                                <span class="hide-menu">Relatórios</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
<?php
    }else{
        
?>
    <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../../index.php?location=1" aria-expanded="false">
                                <i class="fas fa-tachometer-alt"></i>
                                <span class="hide-menu">Painel de Controle</span>
                            </a>
                        </li>
                         <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../../funcionarios.php?location=1" aria-expanded="false">
                                <i class="fas fa-user-circle"></i>
                                <span class="hide-menu">Funcionários</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../../plantao.php?location=1" aria-expanded="false">
                                <i class="fas fa-calendar-check"></i>
                                <span class="hide-menu">Plantão</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../../medicos.php?location=1" aria-expanded="false">
                                <i class="fas fa-user-md"></i>
                                <span class="hide-menu">Médicos</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../../especialidade.php?location=1" aria-expanded="false">
                            <i class="fas fa-atom"></i>
                                <span class="hide-menu">Especialidade</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../../relatorios.php?location=1" aria-expanded="false">         
                                <i class="fas fa-notes-medical"></i> 
                                <span class="hide-menu">Relatórios</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
<?php
    }
?>