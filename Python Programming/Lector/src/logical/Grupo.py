'''
Created on Mar 21, 2019

@author: 20161229
'''

class Grupo(object):
    def __init__(self, id_grupo, clave, profesor, materia, hora_inicio, hora_fin, aula, id_prof):
        self.__id_grupo = id_grupo
        self.__clave = clave
        self.__profesor = profesor
        self.__materia = materia
        self.__hora_inicio = hora_inicio
        self.__hora_fin = hora_fin
        self.__aula = aula
        self.__llego_prof = False
        self.__id_prof = id_prof
        self.__estudiantes = []

    def get_estudiantes(self):
        return self.__estudiantes


    def set_estudiantes(self, value):
        self.__estudiantes = value


    def del_estudiantes(self):
        del self.__estudiantes


    def get_id_grupo(self):
        return self.__id_grupo


    def get_clave(self):
        return self.__clave


    def get_profesor(self):
        return self.__profesor


    def get_materia(self):
        return self.__materia


    def get_hora_inicio(self):
        return self.__hora_inicio


    def get_hora_fin(self):
        return self.__hora_fin


    def get_aula(self):
        return self.__aula


    def get_llego_prof(self):
        return self.__llego_prof


    def get_id_prof(self):
        return self.__id_prof


    def set_id_grupo(self, value):
        self.__id_grupo = value


    def set_clave(self, value):
        self.__clave = value


    def set_profesor(self, value):
        self.__profesor = value


    def set_materia(self, value):
        self.__materia = value


    def set_hora_inicio(self, value):
        self.__hora_inicio = value


    def set_hora_fin(self, value):
        self.__hora_fin = value


    def set_aula(self, value):
        self.__aula = value


    def set_llego_prof(self, value):
        self.__llego_prof = value


    def set_id_prof(self, value):
        self.__id_prof = value


    def del_id_grupo(self):
        del self.__id_grupo


    def del_clave(self):
        del self.__clave


    def del_profesor(self):
        del self.__profesor


    def del_materia(self):
        del self.__materia


    def del_hora_inicio(self):
        del self.__hora_inicio


    def del_hora_fin(self):
        del self.__hora_fin


    def del_aula(self):
        del self.__aula


    def del_llego_prof(self):
        del self.__llego_prof


    def del_id_prof(self):
        del self.__id_prof
        
    def estudianteByMatricula(self, matricula):
        index = 0
        for aux in self.__estudiantes:
            if str(aux.get_matricula()) == matricula:
                return index
            index = index + 1
        return -1